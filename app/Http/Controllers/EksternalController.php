<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage, Crypt};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\{Eksternal, EksternalVisitor, EksternalHistory, EksternalFull, EksternalDetail, EksternalRisk, MasterCard, MasterCompany, MasterRack, MasterRisks, MasterRoom, Entry, EntryRack, MasterCardType};
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


}
