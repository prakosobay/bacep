<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Cleaning;
use App\Models\CleaningHistory;
use App\Models\CleaningFull;
use App\Models\MasterOb;
use App\Models\ObCompany;
use App\Models\PilihanWork;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\NotifEmail;
use App\Mail\NotifReject;
use App\Mail\NotifFull;
use App\Models\FormCleaning;
use App\Models\FullCleaning;
use App\Models\LogCleaning;
use Illuminate\Support\Facades\Mail;

class CleaningController extends Controller
{
    public function tampilan()
    {
        if (Auth::user()->role == 'bm') {
            $master_ob = MasterOb::all();
            $pilihanwork = PilihanWork::all();
            // $ob = $master_ob->find($id);
            return view('cleaning.form', ['master_ob' => $master_ob, 'pilihanwork' => $pilihanwork]);
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
        if (Auth::user()->role == 'bm') {
            $data['cleaning_name'] = MasterOb::find($data['cleaning_name'])->nama;
            $data['cleaning_name2'] = MasterOb::find($data['cleaning_name2'])->nama;
            $data['cleaning_work'] = PilihanWork::find($data['cleaning_work'])->work;
            $cleaning = FormCleaning::create($data);

            // foreach (['bayu.prakoso@balitower.co.id', 'anjar.yulianto@balitower.co.id', 'taufik.ismail@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
        }
        // dd($cleaning);
        if ($cleaning->exists) {
            $cleaningHistory = LogCleaning::create([
                'form_c_id' => $cleaning->form_c_id,
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
        $cleaningHistory = DB::table('log_cleanings')
            ->join('form_cleanings', 'form_cleanings.form_c_id', '=', 'log_cleanings.form_c_id')
            ->join('users', 'users.id', '=', 'log_cleanings.created_by')
            ->where('log_cleanings.form_c_id', '=', $id)
            ->select('log_cleanings.*', 'users.name', 'form_cleanings.cleaning_work')
            ->get();
        // dd($cleaningHistory);
        return view('detail_cleaning', ['cleaningHistory' => $cleaningHistory]);
    }

    public function approve_cleaning(Request $request)
    {

        // $lasthistory = SurveyHistory::where('survey_id', '=', $request->survey_id)->latest()->first();
        $lasthistoryC = LogCleaning::where('form_c_id', '=', $request->form_c_id)->latest()->first();
        $lasthistoryC->update(['aktif' => false]);

        $status = '';
        if (($lasthistoryC->status == 'requested') && (Auth::user()->role == 'review')) {
            $status = 'reviewed';
        } elseif (($lasthistoryC->status == 'reviewed') && (Auth::user()->role == 'check')) {
            $status = 'checked';
        } elseif (($lasthistoryC->status == 'checked') && (Auth::user()->role == 'security')) {
            $status = 'acknowledge';
        } elseif (($lasthistoryC->status == 'acknowledge') && (Auth::user()->role == 'head')) {
            $status = 'final';
        } elseif ($lasthistoryC->status == 'final') {
            $cleaning = FormCleaning::find($request->form_c_id)->first();
        }

        $role_to = '';
        if (($lasthistoryC->role_to == 'review')) {
            // foreach (['rio.christian@balitower.co.id', 'rafli.ashshiddiqi@balitower.co.id', 'darajat.indraputra@balitower.co.id', 'lingga.anugerah@balitower.co.id'] as $recipient) {
            //     foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
            $role_to = 'check';
        } elseif (($lasthistoryC->role_to == 'check')) {
            // foreach (['security.bacep@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
            $role_to = 'security';
        } elseif (($lasthistoryC->role_to == 'security')) {
            // foreach (['panggah@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifEmail());
            // }
            $role_to = 'head';
        }

        $cleaningHistory = LogCleaning::create([
            'form_c_id' => $request->form_c_id,
            'created_by' => Auth::user()->id,
            'role_to' => $role_to,
            'status' => $status,
            'aktif' => true,
        ]);

        if ($lasthistoryC->role_to == 'head') {
            $cleaning = FormCleaning::find($request->form_c_id);
            // dd($cleaning);
            // foreach (['dc@balitower.co.id'] as $recipient) {
            //     Mail::to($recipient)->send(new NotifFull($cleaning));
            // }
            $cleaning = FormCleaning::where('form_c_id', $request->form_c_id)->first();
            // dd($cleaning);
            $cleaningFull = FullCleaning::create([
                'form_c_id' => $cleaning->form_c_id,
                'cleaning_name_1' => $cleaning->cleaning_name_1,
                'cleaning_name_2' => $cleaning->cleaning_name_2,
                'cleaning_work' => $cleaning->cleaning_work,
                'cleaning_date' => $cleaning->created_at,
                'status' => 'Full Approved',
                // 'link' => ("http://127.0.0.1:8000/cleaning_pdf/$cleaning->form_c_id"),
                'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->form_c_id"),
            ]);
        }

        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function cleaning_reject(Request $request)
    {
        $lasthistoryC = LogCleaning::where('form_c_id', '=', $request->form_c_id)->latest()->first();
        if ($lasthistoryC->role_to != 'security') {
            $lasthistoryC->update(['aktif' => false]);

            $cleaningHistory = LogCleaning::create([
                'form_c_id' => $request->form_c_id,
                'created_by' => Auth::user()->id,
                'role_to' => 0,
                'status' => 'rejected',
                'aktif' => true,
            ]);

            $cleaning = FormCleaning::find($request->form_c_id);
            // dd($cleaning);
            foreach (['data.center7@balitower.co.id', 'security.bacep@balitower.co.id'] as $recipient) {
                // $notification = new NotifReject($cleaning);
                // Mail::to($recipient)->send(
                //     $this->build($cleaning)
                // );

                Mail::to($recipient)->send(new NotifReject($cleaning));
            }
            // dd($cleaningHistory);
            return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }
    }

    public function cetak_cleaning_pdf($id)
    {
        // $masterob = MasterOb::find(1);
        $cleaning = FormCleaning::find($id);
        // dd($cleaning);
        $lasthistoryC = LogCleaning::where('form_c_id', $id)->where('aktif', 1)->first();
        $cleaningHistory = DB::table('log_cleanings')
            ->join('form_cleanings', 'form_cleanings.form_c_id', '=', 'log_cleanings.form_c_id')
            ->join('users', 'users.id', '=', 'log_cleanings.created_by')
            // ->join('users', 'users.id', '=', 'log_cleanings.name')
            ->where('log_cleanings.form_c_id', '=', $id)
            ->where('log_cleanings.status', '!=', 'visitor')
            ->select('log_cleanings.*', 'users.name', 'created_by')
            ->get();
        // dd($cleaningHistory);
        $pdf = PDF::loadview('cleaning_pdf', ['cleaning' => $cleaning, 'lasthistoryC' => $lasthistoryC, 'cleaningHistory' => $cleaningHistory])->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
    }
}
