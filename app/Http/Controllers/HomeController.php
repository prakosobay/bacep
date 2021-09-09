<?php

namespace App\Http\Controllers;

use App\Models\CleaningHistory;
use Illuminate\Http\Request;
use App\Models\User;
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
        $arrole = [];
        foreach ($role_2 as $rolee) {
            $arrole[] = $rolee->name;
        }
        Session::put('arrole', $arrole);

        return view('home');
    }

    public function approval_view($type_view)
    {
        if ((Gate::denies('isAdmin')) && (Gate::denies('isBm'))) {
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
                // $lasthistoryC = CleaningHistory::all();
                return view('hasil_cleaning', ['cleaning' => $cleaning]);
            } else {
                return view('approval');
            }
        } else {
            abort(403);
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
    }

    public function approval_full($type_form)
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isBoss')) || (Gate::allows('isAdmin'))) {
            if ($type_form == 'all') {
                return view('full_approval');
            } elseif ($type_form == 'survey') {
                $surveyFull = DB::table('survey_fulls')->get();
                return view('full_survey', ['surveyFull' => $surveyFull]);
            } elseif ($type_form == 'cleaning') {
                $cleaningFull = DB::table('cleaning_fulls')->get();
                return view('full_cleaning', ['cleaningFull' => $cleaningFull]);
            }
        } else {
            abort(403);
        }
    }
}
