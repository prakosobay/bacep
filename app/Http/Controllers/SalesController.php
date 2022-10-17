<?php

namespace App\Http\Controllers;

use App\Models\{AccessRequestInternal, ChangeRequestInternal, Internal, InternalFull, InternalHistory, InternalVisitor};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Mail, Storage};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class SalesController extends Controller
{
    public function form()
    {
        return view('sales.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit' => ['required', 'date'],
            'leave' => ['required', 'date', 'after_or_equal:visit'],
            'name' => ['nullable', 'string', 'max:255'],
            'number' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'respon' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:14'],
        ]);

        $getForm = $request->all();

        DB::beginTransaction();

        try {

            $insertForm = Internal::create([
                'requestor_id' => auth()->user()->id,
                'work' => 'Survey Data Center',
                'visit' => $getForm['visit'],
                'leave' => $getForm['leave'],
                'isColo' => false,
                'isSurvey' => true,
            ]);

            $arrayVisitor = [];
            foreach ($getForm['name'] as $k => $v) {
                $insertArray = [];
                if (isset($getForm['name'][$k])) {

                    $insertArray = [
                        'internal_id' => $insertForm->id,
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
            InternalVisitor::insert($arrayVisitor);

            // $notif_email = DB::table('internals')
            //     ->join('users', 'internals.requestor_id', '=', 'users.id')
            //     ->select('users.name as requestor', 'internals.id', 'internals.visit', 'internals.created_at as created', 'internals.work', 'internals.leave')
            //     ->where('internals.id', $insertForm->id)
            //     ->first();
            // foreach ([
            //     'bayu.prakoso@balitower.co.id',
            // ] as $recipient) {
            //     Mail::to($recipient)->send(new NotifSalesForm($notif_email));
            // }

            InternalHistory::create([
                'internal_id' => $insertForm->id,
                'created_by' => auth()->user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
            ]);

            DB::commit();
            return redirect()->route('dashboardInternal', auth()->user()->department)->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function pdf($id)
    {
        $getForm = Internal::findOrFail($id);
        $getLastHistory = InternalHistory::where('internal_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);

        $getHistory = InternalHistory::where('internal_id', $id)
                ->join('users', 'users.id', '=', 'internal_histories.created_by')
                ->select('internal_histories.*', 'users.name')
                ->get();

        $nomorAR = AccessRequestInternal::where('internal_id', $id)->first();
        $nomorCR = ChangeRequestInternal::where('internal_id', $id)->first();
        $pdf = PDF::loadview('sales.pdf', compact('getForm', 'getLastHistory', 'getHistory', 'nomorAR', 'nomorCR'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function approve(Request $request, $id)
    {

    }
}
