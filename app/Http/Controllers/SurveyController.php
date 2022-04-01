<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use phpDocumentor\Reflection\Types\Nullable;
use App\Models\{Survey, SurveyHistory, SurveyVisitor};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session};

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'date_of_visit' => ['required', 'date', 'after:yesterday'],
            'date_of_leave' => ['required', 'date', 'after:yesterday', 'after_or_equal:date_of_visit'],
            'nama_requestor' => ['required', 'string', 'max:100'],
            'dept_requestor' => ['required', 'string', 'max:200'],
            'phone_requestor' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_name1' => ['required', 'string', 'max:100'],
            'visitor_nik1' => ['required'],
            'visitor_phone1' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_company1' => ['required', 'string', 'max:200'],
            'visitor_dept1' => ['required', 'string', 'max:200'],
            'visitor_name2' => ['string', 'max:100', 'nullable'],
            'visitor_phone2' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company2' => ['string', 'max:200', 'nullable'],
            'visitor_dept2' => ['string', 'max:200', 'nullable'],
            'visitor_name3' => ['string', 'max:100', 'nullable'],
            'visitor_phone3' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company3' => ['string', 'max:200', 'nullable'],
            'visitor_dept3' => ['string', 'max:200', 'nullable'],
            'visitor_name4' => ['string', 'max:100', 'nullable'],
            'visitor_phone4' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company4' => ['string', 'max:200', 'nullable'],
            'visitor_dept4' => ['string', 'max:200', 'nullable'],
            'visitor_name5' => ['string', 'max:100', 'nullable'],
            'visitor_phone5' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            'visitor_company5' => ['string', 'max:200', 'nullable'],
            'visitor_dept5' => ['string', 'max:200', 'nullable'],
        ]);

        $survey = Survey::create([
            'visit' => $request->date_of_visit,
            'leave' => $request->date_of_leave,
            'name-req' => $request->nama_requestor,
            'dept-req' => $request->dept_requestor,
            'phone-req' => $request->phone_requestor,
            'pic' => [
                        ['name' =>$request->visitor_name1, 'nik' => $request->visitor_nik1, 'phone' => $request->visitor_phone1, 'company' => $request->visitor_company1, 'dept' => $request->visitor_dept1],
                        ['name' =>$request->visitor_name2, 'nik' => $request->visitor_nik2, 'phone' => $request->visitor_phone2, 'company' => $request->visitor_company2, 'dept' => $request->visitor_dept2],
                        ['name' =>$request->visitor_name3, 'nik' => $request->visitor_nik3, 'phone' => $request->visitor_phone3, 'company' => $request->visitor_company3, 'dept' => $request->visitor_dept3],
                        ['name' =>$request->visitor_name4, 'nik' => $request->visitor_nik4, 'phone' => $request->visitor_phone4, 'company' => $request->visitor_company4, 'dept' => $request->visitor_dept4],
                        ['name' =>$request->visitor_name5, 'nik' => $request->visitor_nik5, 'phone' => $request->visitor_phone5, 'company' => $request->visitor_company5, 'dept' => $request->visitor_dept5],
                    ]
        ]);

        $log = SurveyHistory::create([
            'survey_id' => $survey->id,
            'created_by' => Auth::user()->id,
            'role_to' => 'review',
            'status' => 'requested',
            'aktif' => '1',
            'pdf' => false
        ]);
        if($survey && $log){
            return "done";
        }else{
            return "gagal";
        }

    }

    public function approve_survey(Request $request)
    {
        $logsurvey = SurveyHistory::where('id', '=', $request->id)->latest()->first();
        dd($logsurvey);

        if($logsurvey->pdf == true){
            $logsurvey->update(['aktif' => false]);

            $status = '';
            if ($logsurvey->status == 'requested') {
                $status = 'reviewed';
            } elseif ($logsurvey->status == 'reviewed') {
                $status = 'checked';
            } elseif ($logsurvey->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($logsurvey->status == 'acknowledge') {
                $status = 'final';
            }
        }
    }

    public function survey_pdf($id)
    {
        $survey = Survey::findOrFail($id);
        $pdf = $survey->pic;
    }

    public function json($id)
    {
        $json = Survey::findOrFail($id);
        $pic = $json->pic;
        dd($pic);
    }
}
