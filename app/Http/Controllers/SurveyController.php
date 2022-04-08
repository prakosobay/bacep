<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use phpDocumentor\Reflection\Types\Nullable;
use App\Models\{Survey, SurveyHistory, User};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session};
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;

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
            'visitor_name[]' => ['string', 'max:100'],
            'visitor_nik[]' => [],
            'visitor_phone[]' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'visitor_company[]' => ['string', 'max:200'],
            'visitor_dept[]' => ['string', 'max:200'],
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

        $survey = Survey::create([
            'visit' => $request->date_of_visit,
            'leave' => $request->date_of_leave,
            'name-req' => $request->nama_requestor,
            'dept-req' => $request->dept_requestor,
            'phone-req' => $request->phone_requestor,
            'visit_name' => $request->visitor_name,
            'visit_nik' => $request->visitor_nik,
            'visit_phone' => $request->visitor_phone,
            'visit_company' => $request->visitor_company,
            'visit_dept' => $request->visitor_dept,
            // [
            //             ['name' =>$request->visitor_name1, 'nik' => $request->visitor_nik1, 'phone' => $request->visitor_phone1, 'company' => $request->visitor_company1, 'dept' => $request->visitor_dept1],
            //             ['name' =>$request->visitor_name2, 'nik' => $request->visitor_nik2, 'phone' => $request->visitor_phone2, 'company' => $request->visitor_company2, 'dept' => $request->visitor_dept2],
            //             ['name' =>$request->visitor_name3, 'nik' => $request->visitor_nik3, 'phone' => $request->visitor_phone3, 'company' => $request->visitor_company3, 'dept' => $request->visitor_dept3],
            //             ['name' =>$request->visitor_name4, 'nik' => $request->visitor_nik4, 'phone' => $request->visitor_phone4, 'company' => $request->visitor_company4, 'dept' => $request->visitor_dept4],
            //             ['name' =>$request->visitor_name5, 'nik' => $request->visitor_nik5, 'phone' => $request->visitor_phone5, 'company' => $request->visitor_company5, 'dept' => $request->visitor_dept5],
            //         ]
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
            return view('homepage');
        }else{
            return "gagal";
        }
    }

    public function approve_survey(Request $request)
    {
        $logsurvey = SurveyHistory::where('id', '=', $request->id)->latest()->first();
        // dd($logsurvey);

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

            $role_to = '';
            if (($logsurvey->role_to == 'review')) {
                $role_to = 'check';
            } elseif (($logsurvey->role_to == 'check')) {
                $role_to = 'security';
            } elseif (($logsurvey->role_to == 'security')) {
                $role_to = 'head';
            }if ($logsurvey->role_to == 'head') {
                $survey = Survey::where('id', $request->id)->first();
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

    public function data_approval()
    {
        // return Datatables::of(Survey::query())->make(true);

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

    public function survey_pdf($id)
    {
        $survey = Survey::findOrFail($id);
        $pdf = $survey->pic;
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
