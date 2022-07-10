<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use phpDocumentor\Reflection\Types\Nullable;
use App\Models\{Survey, SurveyFull, SurveyHistory, User};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session, Mail};
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class SurveyController extends Controller
{

    // Show Pages
    public function form_show() // Menampilkan form survey
    {
        return view('sales.form');
    }

    public function store(Request $request)
    {
         // Get all data request
         $data = $request->all();
 
        dd($request->all());
        $validated = $request->validate([
            'date_of_visit' => ['required', 'date', 'after:yesterday'],
            'date_of_leave' => ['required', 'date', 'after:yesterday', 'after_or_equal:date_of_visit'],
            'nama_requestor' => ['required', 'string', 'max:100'],
            'dept_requestor' => ['required', 'string', 'max:200'],
            'phone_requestor' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_name' => ['max:100'],
            'visitor_phone' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_company' => ['string', 'max:200'],
            'visitor_dept' => ['string', 'max:200'],
            // 'visitor_name2' => ['string', 'max:100', 'nullable'],
            // 'visitor_phone2' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            // 'visitor_company2' => ['string', 'max:200', 'nullable'],
            // 'visitor_dept2' => ['string', 'max:200', 'nullable'],
            // 'visitor_name3' => ['string', 'max:100', 'nullable'],
            // 'visitor_phone3' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            // 'visitor_company3' => ['string', 'max:200', 'nullable'],
            // 'visitor_dept3' => ['string', 'max:200', 'nullable'],
            // 'visitor_name4' => ['string', 'max:100', 'nullable'],
            // 'visitor_phone4' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            // 'visitor_company4' => ['string', 'max:200', 'nullable'],
            // 'visitor_dept4' => ['string', 'max:200', 'nullable'],
            // 'visitor_name5' => ['string', 'max:100', 'nullable'],
            // 'visitor_phone5' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10', 'nullable'],
            // 'visitor_company5' => ['string', 'max:200', 'nullable'],
            // 'visitor_dept5' => ['string', 'max:200', 'nullable'],
        ]);

        
        $input = $request->all();
        $Survey_form = Survey::create([
            'date_of_visit' => $input['date_of_visit'],
            'date_of_leave' => $input['date_of_leave'],
            'nama_requestor' => $input['nama_requestor'],
            'dept_requestor' => $input['dept_requestor'],
            'visitor_name' => $input['visitor_name'],
            'visitor_phone'=> $input['visitor_phone'],
            'visitor_company'=> $input['visitor_company'],
            'visitor_dept'=> $input['visitor_dept'],
            'testing' => $input['testing'],
            'rollback' => $input['rollback'],
        ]);


 
        $survey_detail = TroubleshootBmDetail::insert($survey_insert);

        $log = SurveyHistory::create([
            'survey_id' => $survey->id,
            'created_by' => Auth::user()->id,
            'role_to' => 'review',
            'status' => 'requested',
            'aktif' => '1',
            'pdf' => false
        ]);
 
        if($survey && $log){
            return view('homepage');
        }else{
            return "gagal";
        }
    }

    public function approve(Request $request)
    {
        // dd($request);
        $logsurvey = SurveyHistory::where('survey_id', '=', $request->id)->latest()->first();
        // dd($logsurvey);

        if($logsurvey->pdf == true){
            $logsurvey->update(['aktif' => false]);

            $status = '';
            if ($logsurvey->status == 'requested') {
                $status = 'reviewed';
            } elseif ($logsurvey->status == 'reviewed') {
                $status = 'acknowledge';
            } elseif ($logsurvey->status == 'acknowledge') {
                $status = 'final';
            } elseif ($logsurvey->status == 'final') {
                $survey = Survey::find($request->id)->first();
            }

            $role_to = '';
            if (($logsurvey->role_to == 'review')) {
                $role_to = 'security';
            } elseif (($logsurvey->role_to == 'security')) {
                $role_to = 'head';
            } elseif ($logsurvey->role_to == 'head') {
                $pick = Survey::where('id', $request->id)->first();
                // dd($pick);
                $full = SurveyFull::create([
                    'survey_id' => $pick->id,
                    'visit' => $pick->visit,
                    'leave' => $pick->leave,
                    'company' => $pick->visit_company[0],
                    'link' => ("http://127.0.0.1:8000/survey_pdf/$pick->id"),
                    // 'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->cleaning_id"),
                ]);
            }

            $history = SurveyHistory::create([
                'survey_id' => $request->id,
                'created_by' => Auth::user()->id,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);
        }
        else{
            abort(403);
        }
        return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function reject(Request $request)
    {
        $logsurvey = SurveyHistory::where('survey_id', '=', $request->id)->latest()->first();
        // dd($logsurvey);
        if (Gate::denies('isSecurity')) {
            if ($logsurvey->pdf == true) {
                $logsurvey->update(['aktif' => false]);

                $history = SurveyHistory::create([
                    'survey_id' => $request->id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // $survey = Survey::find($request->id);
                // foreach (['badai.sino@balitower.co.id', 'security.bacep@balitower.co.id'] as $recipient) {
                //     Mail::to($recipient)->send(new NotifReject($cleaning));
                // }
                return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(403);
            }
        }
    }

    public function data_approval()
    {

        $survey = DB::table('surveys')->select(['id', 'created_at', 'visit', '']);
        // $pic = $survey->pic;
        // dd($pic);
        return Datatables::of($survey)
            ->editColumn('created_at', function ($survey) {
                return $survey->created_at ? with(new Carbon($survey->created_at))->format('d/m/Y') : '';
            })
            ->editColumn('visit', function ($survey) {
                return $survey->visit ? with(new Carbon($survey->visit))->format('d/m/Y') : '';;
            })
            ->make(true);
    }

    public function data_history()
    {
        $survey_log = DB::table('survey_histories')
                ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_id')
                ->join('users', 'users.id', '=', 'survey_histories.created_by')
                ->select('survey_histories.*', 'surveys.visit', 'users.name');
        return Datatables::of($survey_log)
            ->editColumn('updated_at', function ($survey_log) {
                return $survey_log->updated_at ? with(new Carbon($survey_log->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('visit', function ($survey_log) {
                return $survey_log->visit ? with(new Carbon($survey_log->visit))->format('d/m/Y') : '';;
            })
            ->make(true);
    }

    public function full()
    {
        $full = SurveyFull::all();
        return view('sales.full_approval', compact('full'));
    }

    public function pdf($id)
    {
        $survey = Survey::findOrFail($id);
        $log = SurveyHistory::where('survey_id', $id)->where('aktif', 1)->first();
        $log->update(['pdf' => true]);

        $join = DB::table('survey_histories')
            ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_id')
            ->join('users', 'users.id', '=', 'survey_histories.created_by')
            ->where('survey_histories.survey_id', '=', $id)
            ->select('survey_histories.*', 'users.name', 'created_by')
            ->get();
            // dd($survey);
        $pdf = PDF::loadview('sales.pdf', compact('survey', 'log', 'join'));
        return $pdf->stream();
    }

    public function json()
    {

        // $survey = DB::table('surveys')->select(['pic', 'visit'])->get();
        // $data = Survey::all();
        // $user->pic['name'] = $value;
        // dd ($value);
        // $data = DB::table('surveys')
            // ->whereJsonContains('pic->name', 'Sid Conroy')
            // ->whereJsonContains('pic->nik', [])
            // ->whereJsonContains('pic->company', [])
            // ->whereJsonContains('pic->dept', [])
            // ->get();


        // echo $value[5];

        // $string = Survey::find($id);
        // $area = json_decode($string, true);

        //     foreach($area['pic'] as $i => $v)
        //     {
        //         echo $v['pic'].'<br/>';
        //     }

            // foreach (json_decode($user) as $area)
            // {
            //     print($area);
            //
            //  [pic] => [
            //     {
            //         "name":"Mr. Isac Windler I",
            //         "nik":[9],
            //         "phone":"+1-724-607-2281",
            //         "company":"Friesen PLC",
            //         "dept":"Michele Russel Sr."
            //     },
            //     {
            //         "name":"Wilhelmine West",
            //         "nik":[4],
            //         "phone":"907-856-3247",
            //         "company":"Frami Inc",
            //         "dept":"Ciara Zulauf"
            //     },
            //     {
            //         "name":"Oswaldo Hackett",
            //         "nik":[15],
            //         "phone":"463.316.5400",
            //         "company":"Smith-Nienow",
            //         "dept":"Hudson Ernser"
            //     },
            //     {
            //         "name":"Darien Mosciski",
            //         "nik":[9],
            //         "phone":"774.951.2350",
            //         "company":"Stroman LLC",
            //         "dept":"Alphonso Bashirian"
            //     },
            //     {
            //         "name":"Christian Langworth",
            //         "nik":[16],
            //         "phone":"341.829.4589",
            //         "company":"Bruen, Ortiz and Borer",
            //         "dept":"Maryjane Cruickshank III"
            //     }
            // ];
    }
}
