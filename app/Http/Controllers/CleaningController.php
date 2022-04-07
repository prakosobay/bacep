<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{User, Role, MasterOb, PilihanWork};
use App\Models\{Cleaning, CleaningHistory, CleaningFull};
use phpDocumentor\Reflection\PseudoTypes\True_;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class CleaningController extends Controller
{
    // public function tampilan()
    // {
    //     if (Gate::allows('isBm')) {
    //         $master_ob = MasterOb::all();
    //         $pilihanwork = PilihanWork::all();
    //         return view('cleaning.form', ['master_ob' => $master_ob, 'pilihanwork' => $pilihanwork]);
    //     } else {
    //         abort(403);
    //     }
    // }


    public function data_history()
    {
        $cleaning_log = DB::table('cleaning_histories')
                ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                ->select('cleaning_histories.*', 'cleanings.validity_from');
        return Datatables::of($cleaning_log)
            ->editColumn('updated_at', function ($cleaning_log) {
                return $cleaning_log->updated_at ? with(new Carbon($cleaning_log->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('validity_from', function ($cleaning_log) {
                return $cleaning_log->validity_from ? with(new Carbon($cleaning_log->validity_from))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function data_full()
    {
        $full = DB::table('cleaning_fulls');
        return Datatables::of($full)
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';
            })
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';;
            })
            ->make(true);
    }

    public function detail_ob($id)
    {
        $data = MasterOb::find($id);
        // dd($data);
        return isset($data) && !empty($data) ? response()->json(['status' => 'SUCCESS', 'data' => $data]) : response()->json(['status' => 'FAILED', 'data' => []]);
    }

    public function pilihan_work($id)
    {
        $permit = PilihanWork::find($id);
        return isset($permit) && !empty($permit) ? response()->json(['status' => 'SUCCESS', 'permit' => $permit]) : response(['status' => 'FAILED', 'permit' => []]);
    }

    public function submit_data_cleaning(Request $request)
    {
        $data = $request->all();
        // dd($data);
        if (Gate::allows('isBm')) {
            $data['cleaning_name'] = MasterOb::find($data['cleaning_name'])->nama;
            $data['cleaning_name2'] = MasterOb::find($data['cleaning_name2'])->nama;
            $data['cleaning_work'] = PilihanWork::find($data['cleaning_work'])->work;
            $cleaning = Cleaning::create($data);

            foreach ([
                'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
                'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifEmail());
            }
        }
        if ($cleaning->exists) {
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => '1',
                'pdf' => false
            ]);
        }
        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function detail_permit_cleaning($id)
    {
        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->select('cleaning_histories.*', 'users.name', 'cleanings.cleaning_work')
            ->get();
        return view('detail_cleaning', compact('cleaningHistory'));
    }

    public function approve_cleaning(Request $request)
    {
        // dd($request->all());
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        // dd($lasthistoryC);
        if ($lasthistoryC->pdf == true) {
            $lasthistoryC->update(['aktif' => false]);

            $status = '';
            if ($lasthistoryC->status == 'requested') {
                $status = 'reviewed';
            } elseif ($lasthistoryC->status == 'reviewed') {
                $status = 'checked';
            } elseif ($lasthistoryC->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($lasthistoryC->status == 'acknowledge') {
                $status = 'final';
            } elseif ($lasthistoryC->status == 'final') {
                $cleaning = Cleaning::find($request->cleaning_id)->first();
            }

            $role_to = '';
            if (($lasthistoryC->role_to == 'review')) {
                foreach ([
                    'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id'
                ,'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail());
                }
                $role_to = 'check';
            } elseif (($lasthistoryC->role_to == 'check')) {
                foreach (['security.bacep@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail());
                }
                $role_to = 'security';
            } elseif (($lasthistoryC->role_to == 'security')) {
                foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail());
                }
                $role_to = 'head';
            }
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $request->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);
        } else {
            abort(403);
        }

        if ($lasthistoryC->role_to == 'head') {
            $cleaning = Cleaning::find($request->cleaning_id);
            foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                Mail::to($recipient)->send(new NotifFull($cleaning));
            }
            $cleaning = Cleaning::where('cleaning_id', $request->cleaning_id)->first();
            $cleaningFull = CleaningFull::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'cleaning_name' => $cleaning->cleaning_name,
                'cleaning_name2' => $cleaning->cleaning_name2,
                'cleaning_work' => $cleaning->cleaning_work,
                'validity_from' => $cleaning->validity_from,
                'cleaning_date' => $cleaning->created_at,
                'status' => 'Full Approved',
                // 'link' => ("https://dcops.balifiber.id/cleaning_pdf/$cleaning->cleaning_id"),
                'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->cleaning_id"),
            ]);
        }

        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function cleaning_reject(Request $request)
    {
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        if (Gate::denies('isSecurity')) {
            if ($lasthistoryC->pdf == true) {
                $lasthistoryC->update(['aktif' => false]);

                $cleaningHistory = CleaningHistory::create([
                    'cleaning_id' => $request->cleaning_id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                $cleaning = Cleaning::find($request->cleaning_id);
                foreach (['badai.sino@balitower.co.id', 'security.bacep@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifReject($cleaning));
                }
                return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(403);
            }
        }
    }

    public function cetak_cleaning_pdf($id)
    {
        $cleaning = Cleaning::find($id);
        $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();
        $lasthistoryC->update(['pdf' => true]);

        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->where('cleaning_histories.status', '!=', 'visitor')
            ->select('cleaning_histories.*', 'users.name', 'created_by')
            ->get();
        $pdf = PDF::loadview('cleaning_pdf', ['cleaning' => $cleaning, 'lasthistoryC' => $lasthistoryC, 'cleaningHistory' => $cleaningHistory])->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function log_full()
    {
        return Datatables::of(CleaningFull::query())->make(true);
    }

    public function log_carbon()
    {
        $carbon = DB::table('cleaning_fulls')->get();

        // dd($carbon);
        return Datatables::of($carbon)
            ->editColumn('cleaning_date', function ($carbon) {
                return $carbon->cleaning_date ? with(new Carbon($carbon->cleaning_date))->format('d/m/Y') : '';
            })
            ->editColumn('validity_from', function ($carbon) {
                return $carbon->validity_from ? with(new Carbon($carbon->validity_from))->format('d/m/Y') : '';
            })
            ->editColumn('validity_to', function ($carbon) {
                return $carbon->validity_to ? with(new Carbon($carbon->validity_to))->format('d/m/Y') : '';
            })
            ->make(true);
    }
}
