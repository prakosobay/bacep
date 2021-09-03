<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{DB, Auth, Gate};
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{User, Role, MasterOb, PilihanWork};
use App\Models\{Cleaning, CleaningHistory, CleaningFull};
use Illuminate\Support\Facades\Mail;


class CleaningController extends Controller
{
    public function tampilan()
    {
        if (Gate::allows('isBm')) {
            $master_ob = MasterOb::all();
            $pilihanwork = PilihanWork::all();
            return view('cleaning.form', ['master_ob' => $master_ob, 'pilihanwork' => $pilihanwork]);
        } else {
            abort(403);
        }
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

            // foreach (['bayu.prakoso@balitower.co.id', 'anjar.yulianto@balitower.co.id', 'taufik.ismail@balitower.co.id', 'rizky.anindya@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
        }
        // dd($cleaning);
        if ($cleaning->exists) {
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => '1'
            ]);
        }
        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);

        return response()->json(['status' => 'FAILED']);
    }

    public function detail_permit_cleaning($id)
    {
        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->select('cleaning_histories.*', 'users.name', 'cleanings.cleaning_work')
            ->get();
        // dd($cleaningHistory);
        return view('detail_cleaning', ['cleaningHistory' => $cleaningHistory]);
    }

    public function approve_cleaning(Request $request)
    {
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        $lasthistoryC->update(['aktif' => false]);

        $status = '';
        if (($lasthistoryC->status == 'requested') && (Auth::user()->role1 == 'review') && (Auth::user()->role2 == 'check')) {
            $status = 'reviewed';
        } elseif (($lasthistoryC->status == 'reviewed') && (Auth::user()->role1 == 'review') && (Auth::user()->role2 == 'check')) {
            $status = 'checked';
        } elseif (($lasthistoryC->status == 'checked') && (Auth::user()->role1 == 'security')) {
            $status = 'acknowledge';
        } elseif (($lasthistoryC->status == 'acknowledge') && (Auth::user()->role1 == 'head')) {
            $status = 'final';
        } elseif ($lasthistoryC->status == 'final') {
            $cleaning = Cleaning::find($request->cleaning_id)->first();
        }

        $role_to = '';
        $role_to2 = '';
        if (($lasthistoryC->role_to == 'review') || ($lasthistoryC->role_to2 == 'review')) {
            // foreach (['rio.christian@balitower.co.id', 'rafli.ashshiddiqi@balitower.co.id', 'darajat.indraputra@balitower.co.id', 'lingga.anugerah@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
            $role_to = 'check';
            $role_to2 = 'check';
        } elseif (($lasthistoryC->role_to == 'check') || ($lasthistoryC->role_to2 == 'check')) {
            // foreach (['security.bacep@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
            $role_to = 'security';
            $role_to2 = '';
        } elseif (($lasthistoryC->role_to == 'security')) {
            // foreach (['panggah@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
            $role_to = 'head';
        }

        $cleaningHistory = CleaningHistory::create([
            'cleaning_id' => $request->cleaning_id,
            'created_by' => Auth::user()->id,
            'role_to' => $role_to,
            // 'role_to2' => $role_to2,
            'status' => $status,
            'aktif' => true,
        ]);

        if ($lasthistoryC->role_to == 'head') {
            $cleaning = Cleaning::find($request->cleaning_id);
            // foreach (['dc@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifFull($cleaning));
            // }
            $cleaning = Cleaning::where('cleaning_id', $request->cleaning_id)->first();
            $cleaningFull = CleaningFull::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'cleaning_name' => $cleaning->cleaning_name,
                'cleaning_name2' => $cleaning->cleaning_name2,
                'cleaning_work' => $cleaning->cleaning_work,
                'validity_from' => $cleaning->validity_from,
                'cleaning_date' => $cleaning->created_at,
                'status' => 'Full Approved',
                'link' => ("http://127.0.0.1:8000/cleaning_pdf/$cleaning->cleaning_id"),
                // 'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->cleaning_id"),
            ]);
        }

        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function cleaning_reject(Request $request)
    {
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        if ($lasthistoryC->role_to != 'security') {
            $lasthistoryC->update(['aktif' => false]);

            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $request->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 0,
                'status' => 'rejected',
                'aktif' => true,
            ]);

            $cleaning = Cleaning::find($request->cleaning_id);
            // foreach (['data.center7@balitower.co.id', 'security.bacep@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifReject($cleaning));
            // }
            return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }
    }

    public function cetak_cleaning_pdf($id)
    {
        $cleaning = Cleaning::find($id);
        $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();
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
}
