<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage, Crypt};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\{AccessRequestEksternal, AccessRequestInternal, ChangeRequestEksternal, ChangeRequestInternal, Eksternal, EksternalVisitor, EksternalHistory, EksternalFull, EksternalDetail, EksternalRisk, MasterCard, MasterCompany, MasterRack, MasterRisks, MasterRoom, Entry, EntryRack, MasterCardType};
use App\Mail\{NotifEksternalForm, NotifInternalForm, NotifInternalReject, NotifInternalFull};

class EksternalController extends Controller
{
    // show pages
    public function dashboard()
    {
        $company = auth()->user()->company;
        return view('eksternal.dashboard', compact('company'));
    }

    public function show_form()
    {
        $risks = MasterRisks::all();
        $getDC = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'Server Room')
            ->orderBy('id', 'asc' )
            ->get();

        $getMMR1 = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'MMR 1')
            ->get();

        $getMMR2 = DB::table('m_racks')
            ->join('m_rooms', 'm_racks.m_room_id', '=', 'm_rooms.id')
            ->select('m_racks.*', 'm_rooms.name as room_name')
            ->where('m_rooms.name', 'MMR 2')
            ->get();

        return view('eksternal.form', compact('getDC', 'risks', 'getMMR1', 'getMMR2'));
    }


    //store data
    public function store(Request $request)
    {
        $request->validate([
            'work' => ['required', 'string', 'max:255'],
            'visit' => ['required', 'date'],
            'leave' => ['required', 'date', 'after_or_equal:visit'],
            'background' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'testing' => ['nullable', 'string', 'max:255'],
            'rollback' => ['nullable', 'string', 'max:255'],
            'reject_note' => ['nullable',  'string', 'max:255'],
            'rack' => ['required'],
        ]);

        $getForm = $request->all();
        $company = auth()->user()->company;
        // dd($getForm);
        DB::beginTransaction();

        try {

            $insert = Eksternal::create([
                'requestor_id' => auth()->user()->id,
                'work' => $request->work,
                'visit' => $request->visit,
                'leave' => $request->leave,
                'background' => $request->background,
                'desc' => $request->desc,
                'testing' => $request->testing,
                'rollback' => $request->rollback,
            ]);

            Entry::create([
                'internal_id' => '',
                'eksternal_id' => $insert->id,
                'dc' => $request->dc,
                'mmr1' => $request->mmr1,
                'mmr2' => $request->mmr2,
                'cctv' => null,
                'genset' => null,
                'panel' => null,
                'baterai' => null,
                'trafo' => null,
                'office1' => null,
                'fss' => null,
                'ups' => null,
                'yard' => null,
                'parking' => null,
                'lain' => null,
            ]);

            $arrayRacks = [];
            foreach($getForm['rack'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['rack'][$k])) {

                    $insertArray = [
                        'eksternal_id' => $insert->id,
                        'm_rack_id' => $getForm['rack'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRacks[] = $insertArray;
                }
            }
            EntryRack::insert($arrayRacks);

            $arrayDetail = [];
            foreach ($getForm['time_start'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['time_start'][$k])) {

                    $insertArray = [
                        'eksternal_id' => $insert->id,
                        'time_start' => $getForm['time_start'][$k],
                        'time_end' => $getForm['time_end'][$k],
                        'activity' => $getForm['activity'][$k],
                        'service_impact' => $getForm['service_impact'][$k],
                        'item' => $getForm['item'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayDetail[] = $insertArray;
                }
            }
            EksternalDetail::insert($arrayDetail);

            $arrayRisk = [];
            foreach ($getForm['risk'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['risk'][$k])) {

                    $insertArray = [
                        'eksternal_id' => $insert->id,
                        'm_risk_id' => $getForm['risk'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayRisk[] = $insertArray;
                }
            }
            EksternalRisk::insert($arrayRisk);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'eksternal_id' => $insert->id,
                        'name' => $getForm['name'][$k],
                        'phone' => $getForm['phone'][$k],
                        'nik' => $getForm['number'][$k],
                        'respon' => $getForm['respon'][$k],
                        'department' => $getForm['department'][$k],
                        'company' => $getForm['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            EksternalVisitor::insert($arrayVisitor);

            // Send Email Notification
            $notif_email = DB::table('eksternals')
                ->join('users', 'eksternals.requestor_id', '=', 'users.id')
                ->select('users.name as requestor', 'eksternals.id', 'eksternals.visit', 'eksternals.created_at as created', 'eksternals.work', 'eksternals.leave')
                ->where('eksternals.id', $insert->id)
                ->first();
            // dd($notif_email);
            foreach ([
                'bayu.prakoso@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifEksternalForm($notif_email));
            }

            EksternalHistory::create([
                'eksternal_id' => $insert->id,
                'created_by' => auth()->user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();
            return redirect()->route('dashboardEksternal', $company)->with('success', 'Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function approve($id)
    {

    }


    //PDF
    public function pdf($id)
    {
        $getForm = Eksternal::findOrFail($id);
        $getLastHistory = EksternalHistory::where('eksternal_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);

        $getRisks = DB::table('eksternal_risks')
                ->join('m_risks', 'eksternal_risks.m_risk_id', '=', 'm_risks.id')
                ->where('eksternal_id', $id)
                ->select('eksternal_risks.*', 'm_risks.risk', 'm_risks.poss', 'm_risks.impact', 'm_risks.mitigation')
                ->get();

        $getDetailRisk = DB::table('eksternal_risks')
                ->join('m_risks', 'eksternal_risks.m_risk_id', '=', 'm_risks.id')
                ->where('eksternal_id', $id)
                ->select('eksternal_risks.*', 'm_risks.risk')
                ->first();

        $getHistory = EksternalHistory::where('eksternal_id', $id)
                ->join('users', 'users.id', '=', 'eksternal_histories.created_by')
                ->select('eksternal_histories.*', 'users.name')
                ->get();

        $nomorAR = AccessRequestEksternal::where('eksternal_id', $id)->first();
        $nomorCR = ChangeRequestEksternal::where('eksternal_id', $id)->first();
        $pdf = PDF::loadview('eksternal.pdf', compact('getForm', 'getLastHistory', 'getHistory', 'getRisks', 'getDetailRisk', 'nomorAR', 'nomorCR'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }


    // Yajra
    public function yajra_history()
    {
        $history = DB::table('eksternal_histories')
            ->leftJoin('eksternals', 'eksternal_histories.eksternal_id', '=', 'eksternals.id')
            ->leftJoin('users', 'eksternal_histories.created_by', '=', 'users.id')
            ->select('eksternal_histories.status', 'eksternal_histories.role_to', 'eksternal_histories.aktif', 'eksternal_histories.updated_at', 'eksternals.visit', 'users.name as updatedby', 'eksternals.id as id');
        return Datatables::of($history)
            ->editColumn('visit', function ($history) {
                return $history->visit ? with(new Carbon($history->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function yajra_full_approval()
    {
        $full = DB::table('eksternals')
            ->join('eksternal_visitors', 'eksternals.id', '=', 'eksternal_visitors.eksternal_id')
            ->join('eksternal_fulls', 'eksternals.id', '=', 'eksternal_fulls.eksternal_id')
            ->leftJoin('users', 'eksternals.requestor_id', '=', 'users.id')
            ->select('eksternal_fulls.link', 'eksternal_visitors.name as visitor', 'eksternal_visitors.checkin', 'eksternal_visitors.checkout', 'eksternals.work', 'eksternals.id', 'eksternals.visit', 'eksternal_fulls.status', 'users.name as requestor')
            ->where('eksternal_visitors.deleted_at', null)
            ->where('eksternal_fulls.status', 'Full Approved');
            // ->groupBy('eksternal_id');
        return Datatables::of($full)
            ->editColumn('visit', function ($full) {
                return $full->visit ? with(new Carbon($full->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'internal.actionLink')
            ->make(true);
    }
}
