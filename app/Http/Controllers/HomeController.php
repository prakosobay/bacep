<?php

namespace App\Http\Controllers;

use App\Models\CleaningHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        // $user = User::
        // dd(auth()->user()->role1);
        return view('home');
    }

    public function approval_view($type_view)
    {
        // $role_1 = Auth::user()->role1;
        // $role_2 = Auth::user()->role2;
        $statuss = CleaningHistory::where('aktif', 1)->get();
        // dd($statuss);
        if ((Auth::user()->role1 == 'head') || (Auth::user()->role1 == 'check') || (Auth::user()->role1 == 'review') || (Auth::user()->role1 == 'security')
            || (Auth::user()->role2 == 'review') || (Auth::user()->role2 == 'check')
        ) {
            // if (Auth::user()->role1 != 'bm') {
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
                    ->where('cleaning_histories.status', '=', $statuss)
                    // ->where('cleaning_histories.role_to', '=', $role_2)
                    ->where('cleaning_histories.aktif', '=', 1)
                    ->select('cleanings.*')
                    ->get();
                return view('hasil_cleaning', ['cleaning' => $cleaning]);
            } else {
                return view('approval');
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
    }

    public function approval_full($type_form)
    {
        if ((Auth::user()->role1 == 'head') || (Auth::user()->role1 == 'check') || (Auth::user()->role1 == 'review')
            || (Auth::user()->role2 == 'check') || (Auth::user()->role2 == 'review')
        ) {
            if ($type_form == 'all') {
                return view('full_approval');
            } elseif ($type_form == 'survey') {
                $surveyFull = DB::table('survey_fulls')->get();
                return view('full_survey', ['surveyFull' => $surveyFull]);
            } elseif ($type_form == 'cleaning') {
                $cleaningFull = DB::table('cleaning_fulls')->get();
                return view('full_cleaning', ['cleaningFull' => $cleaningFull]);
            }
        }
    }
}
