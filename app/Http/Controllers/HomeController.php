<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{DB, Auth, Gate, Session};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role_2 = Auth::user()->roles;
        // dd($role_2);
        $arrole = [];
        foreach ($role_2 as $rolee) {
            $arrole[] = $rolee->name;
        }
        Session::put('arrole', $arrole);
        // dd($arrole);
        // return view('home');
        return view('homepage');
    }

    public function dashboard()
    {
        if ((Gate::allows('isAdmin')) || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            return view('item.input');
        } else
         {
            abort(404);
        }
    }

    public function approval_view($type_view)
    {
        if ((Gate::denies('isAdmin'))) {
            $role_1 = Session::get('arrole');
            if ($type_view == 'survey') {
                $survey = DB::table('survey_histories')
                    ->join('survey', 'survey.survey_id', '=', 'survey_histories.survey_id')
                    // ->where('survey_histories.role_to', '=', $role_1)
                    // ->where('survey_histories.role_to', '=', $role_2)
                    ->where('survey_histories.aktif', '=', 1)
                    ->select('survey.*')
                    ->get();
                return view('hasil_survey', ['survey' => $survey]);
            } elseif ($type_view == 'cleaning') {
                $cleaning = DB::table('cleaning_histories')
                    ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                    ->whereIn('cleaning_histories.role_to', $role_1)
                    ->where('cleaning_histories.aktif', '=', 1)
                    ->select('cleanings.*')
                    ->get();
                return view('hasil_cleaning', compact('cleaning'));
            } else if ($type_view == 'other') {
                $otherHistories = DB::table('other_histories')
                    ->join('other', 'other.other_id', '=', 'other_histories.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->where('other_histories.status', '!=', 'revisi')
                    ->where('other_histories.aktif', '=', 1)
                    ->select('other.*', 'other_histories.status', 'other_histories.pdf')
                    ->get();
                    // dd($otherHistories);
                return view('other.show', compact('otherHistories'));
            }else {
                return view('approval');
            }
        } else {
            abort(403);
        }
    }

    public function revisi_view($type_view){
        if((Gate::denies('isSecurity'))){
            $role_1 = Session::get('arrole');
            if($type_view == 'other'){
            $revisi = DB::table('other_histories')
                    ->join('other', 'other.other_id', '=', 'other_histories.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->where('other_histories.status', '=', 'revisi')
                    ->where('other_histories.aktif', '=', 1)
                    ->select('other.*')
                    ->get();
                    // dd($revisi);
                return view('other.revisi', compact('revisi'));
            }
        }
    }

    public function log_view($type_view)
    {
        if ($type_view == 'all') {

            return view('log');
        }
        //elseif ($type_view == 'survey') {
        //     $survey = DB::table('survey_histories')
        //         ->join('survey', 'survey.survey_id', '=', 'survey_histories.survey_id')
        //         ->where('survey_histories.role_to', '=', $role)
        //         ->where('survey_histories.aktif', '=', 1)
        //         ->select('survey.*')
        //         ->get();
        //     return view('log_survey', ['survey' => $survey]);
        // }
        elseif ($type_view == 'cleaning') {
            $cleaningLog = DB::table('cleaning_histories')
                ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                ->select('cleaning_histories.*', 'cleanings.cleaning_work', 'cleanings.validity_from')
                ->get();
            return view('log_cleaning', ['cleaningLog' => $cleaningLog]);

        }
        elseif ($type_view == 'other') {
            $other_log = DB::table('other_histories')
                ->join('other', 'other.other_id', '=', 'other_histories.other_id')
                ->join('users', 'users.id', '=', 'other_histories.created_by')
                ->select('other_histories.*', 'other.other_work', 'other.val_from', 'users.name')
                ->get();
                // dd($other_log);
            return view('other.log', compact('other_log'));
        }
    }

    public function approval_full($type_form)
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            if ($type_form == 'all') {
                return view('full_approval');
            } elseif ($type_form == 'survey') {
                $surveyFull = DB::table('survey_fulls')->get();
                return view('full_survey', compact('surveyFull'));
            } elseif ($type_form == 'cleaning') {
                $cleaningFull = DB::table('cleaning_fulls')->get();
                return view('full_cleaning', compact('cleaningFull'));
            } elseif ($type_form == 'other') {
                $otherFull = DB::table('other_fulls')->get();
                // dd($otherFull);
                return view('other.full', compact('otherFull'));
            }
        } else {
            abort(403);
        }
    }
}
