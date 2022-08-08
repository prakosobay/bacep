<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validitor;
use phpDocumentor\Reflection\Types\Nullable;
use App\Models\{Survey, SurveyFull, SurveyHistory, SurveyPersonil, User};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session, Mail};
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class SurveyController extends Controller
{


    
    public function form_show() // Menampilkan form troubleshoot
    {
        return view('sales.form');
    }

    public function show_troubleshoot_reject()
    {
        return view('sales.list_reject');
    }

    public function store(Request $request)
    {
         // Get all data request
        
        // dd($request->all());
        $validated = $request->validate([
            'date_of_visit' => ['required', 'date', 'after:yesterday'],
            'date_of_leave' => ['required', 'date', 'after:yesterday', 'after_or_equal:date_of_visit'],
            'nama_requestor' => ['required', 'max:100'],
            'phone_requestor' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_name' => ['required','max:100'],
            'id_number' => ['required'],
            'visitor_phone' => ['required'],
            'visitor_company' => [ 'required'],
            'visitor_dept' => ['required'],
            

        ]);
        $input = $request->all();
        $surveyreq = Survey::create([
            'visit' => $request->date_of_visit,
            'leave' => $request->date_of_leave,
            'name_req' => $request->nama_requestor,
            'phone_req' => $request->phone_requestor,

        ]);
        $surveyvit = SurveyPersonil::create([
            'survey_id' => $surveyreq->id,
            'name'=>$request->visitor_name,
            'company'=>$request->visitor_company,
            'numberid'=>$request->id_number, 
            'phone'=>$request->visitor_phone, 
            'department'=>$request->visitor_dept,
        ]);
        $log_survey = SurveyHistory::insert([
            'survey_id' => $surveyreq->id,
            'created_by' => Auth::user()->name,
            'role_to' => 'head',
            'status' => 'requested',
            'aktif' => true,
            'pdf' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $log_survey ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }
    
    public function approve_survey(Request $request) // Flow Approval form troubleshoot
    {
        $last_update = SurveyHistory::where('survey_id', '=', $request->id)->latest()->first();
        if ($last_update->pdf == true) {
            $last_update->update(['aktif' => false]);

            // Perubahan status tiap permit
            $status = '';
            if ($last_update->status == 'requested') {
                $status = 'reviewed';
            } elseif ($last_update->status == 'reviewed') {
                $status = 'checked';
            } elseif ($last_update->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($last_update->status == 'acknowledge') {
                $status = 'final';
            } elseif ($last_update->status == 'final') {
                $full_survey = Survey::find($request->id)->first();
            }
            $log = SurveyHistory::create([
                'troubleshoot_bm_id' => $request->id,
                'created_by' => Auth::user()->name,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);
        } else {
            abort(403);
        }
        return $log->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);

}
  // Convert pdf
 

  public function pdf_survey($id) // Convert PDF permit troubleshoot
  {
      $getTroubleshoot = Survey::find($id);
      $getLastHistory = SurveyHistory::where('survey_id', $id)->where('aktif', 1)->first();
      $getPersonil = SurveyPersonil::where('survey_id', $id)->get();
      $getEntry = DB::table('surveys')->where('id', $id)->first();
      $getLastHistory->update(['pdf' => true]);

      // dd($getEntry);
      $getHistory = DB::table('survey_histories')
          ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_h_id')
          ->where('survey_histories.survey_h_id', '=', $id)
          ->select('survey_histories.*')
          ->get();
      $pdf = PDF::loadview('sales.survey_pdf', compact('getTroubleshoot', 'getPersonil', 'getEntry', 'getLastHistory', 'getHistory'))->setPaper('a4', 'portrait')->setWarnings(false);
      // dd($pdf);
      return $pdf->stream();
  }
  public function yajra_survey_history() // Get data log permit troubleshoot
    {
        $log_survey = DB::table('survey_histories')
            ->join('surveys', 'surveys.id', 'survey_histories.survey__id')
            ->select('survey_histories.*', 'surveys.visit')
            ->orderBy('survey_id', 'desc');
            return Datatables::of($log_survey)
            ->editColumn('updated_at', function ($log_survey) {
                return $log_survey->updated_at ? with(new Carbon($log_survey->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('visit', function ($log_survey) {
                return $log_survey->visit ? with(new Carbon($log_survey->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }
    public function yajra_survey_full_approval() // Get data permit troubleshoot full approval
    {
        $full_approval = DB::table('survey_fulls')
            ->join('surveys', 'surveys.id', '=', 'survey_fulls.survey_id')
            ->select('survey_fulls.*')
            ->orderBy('survey_id', 'desc');
        return Datatables::of($full_approval)
            ->editColumn('visit', function ($full_approval) {
                return $full_approval->visit ? with(new Carbon($full_approval->visit))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'sales.surveyActionLink')
            ->make(true);
    }
    public function yajra_full_reject_survey()
    {
        $getFull = DB::table('survey_fulls')
            ->select(['survey_id', 'visit', 'note', 'work'])
            ->where('note', '!=', null)
            ->orderBy('visit', 'desc');
        return Datatables::of($getFull)
            ->editColumn('visit', function ($getFull) {
                return $getFull->visit ? with(new Carbon($getFull->visit))->format('d/m/Y') : '';
            })
            ->make(true);
    }
}

