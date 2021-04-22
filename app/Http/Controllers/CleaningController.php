<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Cleaning;
use App\Models\CleaningHistory;
use App\Models\CleaningFull;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;

class CleaningController extends Controller
{
    public function submit_data_cleaning(Request $request)
    {
        // dd($request);
        if (Auth::user()->role == 'bm')
            $cleaning = Cleaning::create($request->all());

        foreach (['bayu230498@gmail.com', 'bayu.prakoso@balitower.co.id'] as $recipient) {
            Mail::to($recipient)->send(new NotifEmail());
        }

        if ($cleaning->exists) {
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'created',
                'aktif' => '1'
            ]);

            return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

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

        return view('detail_cleaning', ['cleaningHistory' => $cleaningHistory]);
    }

    public function approve_cleaning(Request $request)
    {

        // $lasthistory = SurveyHistory::where('survey_id', '=', $request->survey_id)->latest()->first();
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        $lasthistoryC->update(['aktif' => false]);

        $status = '';
        if ($lasthistoryC->status == 'created') {
            $status = 'reviewed';
        } elseif ($lasthistoryC->status == 'reviewed') {
            $status = 'checked';
        } elseif ($lasthistoryC->status == 'checked') {
            $status = 'secured';
        } elseif ($lasthistoryC->status == 'secured') {
            $status = 'final';
        } elseif ($lasthistoryC->status == 'final') {
            $cleaning = Cleaning::find($request->cleaning_id)->first();
        }

        $role_to = '';
        if ($lasthistoryC->role_to == 'review') {
            $role_to = 'check';
        } elseif ($lasthistoryC->role_to == 'check') {
            $role_to = 'security';
        } elseif ($lasthistoryC->role_to == 'security') {
            $role_to = 'boss';
        }

        $cleaningHistory = CleaningHistory::create([
            'cleaning_id' => $request->cleaning_id,
            'created_by' => Auth::user()->id,
            'role_to' => $role_to,
            'status' => $status,
            'aktif' => true,
        ]);

        if ($lasthistoryC->role_to == 'boss') {
            $cleaning = Cleaning::where('cleaning_id', $request->cleaning_id)->first();
            // dd($cleaning);
            $cleaningFull = CleaningFull::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'cleaning_name_1' => $cleaning->cleaning_name_1,
                'cleaning_name_2' => $cleaning->cleaning_name_2,
                'cleaning_work' => $cleaning->cleaning_work,
                'cleaning_date' => $cleaning->created_at,
                'status' => 'Full Approved',
                'link' =>  url("/cleaning_pdf/$cleaning->cleaning_id"),
            ]);
        }

        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function cleaning_reject(Request $request)
    {
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        if ($lasthistoryC->role_to != 'security') {
            $lasthistoryC->update(['aktif' => false]);

            // Mail::to(Auth::user()->role)->send(new MailTemp1());
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $request->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 0,
                'status' => 'rejected',
                'aktif' => true,
            ]);
            // dd($cleaningHistory);
            return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }
    }

    public function cetak_cleaning_pdf($id)
    {
        $cleaning = Cleaning::find($id);
        $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();
        // $cleaningHistory = cleaningHistory::join('')->where('cleaning.cleaning_id', $id)->where('status', )->orderBy('cleaning_history', 'ASC')->findAll();
        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            // ->join('users', 'users.id', '=', 'cleaning_histories.name')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            // ->where('cleaning_histories.role_to', '!=', '0')
            // ->where('cleaning_histories.role_to', '!=', 'check')
            ->where('cleaning_Histories.status', '!=', 'created')
            ->where('cleaning_histories.status', '!=', 'visitor')
            ->select('cleaning_histories.*', 'users.name', 'created_by')
            ->get();
        // dd($cleaningHistory);
        // $user = Users::where('id', $id)->where('name', $name)->get();
        // dd($cleaningHistory);
        $pdf = PDF::loadview('cleaning_pdf', ['cleaning' => $cleaning, 'lasthistoryC' => $lasthistoryC, 'cleaningHistory' => $cleaningHistory])->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
    }
}
