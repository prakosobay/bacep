<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Survey;
use App\Models\SurveyHistory;
use App\Models\SurveyFull;
use App\Models\Cleaning;
use App\Models\CleaningHistory;
use App\Models\CleaningFull;
use App\Models\MaintenanceHistory;
use App\Models\Troubleshoot;
use App\Models\Mounting;
use App\Models\MountingHistory;
use App\Models\TroubleshootHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

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
        // dd(Auth::user()->role);
        if ((Auth::user()->role == 'head') ||
            (Auth::user()->role == 'check') ||
            (Auth::user()->role == 'review') ||
            (Auth::user()->role == 'bm') ||
            (Auth::user()->role == 'security')
        ) {
            return view('home');
            // The user is logged in...
        } else {
            return view('auth.login');
        }
    }

    public function approval_view($type_view)
    {

        $role = Auth::user()->role;
        if ((Auth::user()->role == 'head') || (Auth::user()->role == 'check') || (Auth::user()->role == 'review') || (Auth::user()->role == 'security'))
            if ($type_view == 'all') {

                return view('approval');
            } elseif ($type_view == 'survey') {
                $survey = DB::table('survey_histories')
                    ->join('survey', 'survey.survey_id', '=', 'survey_histories.survey_id')
                    ->where('survey_histories.role_to', '=', $role)
                    ->where('survey_histories.aktif', '=', 1)
                    ->select('survey.*')
                    ->get();
                return view('hasil_survey', ['survey' => $survey]);
            } elseif ($type_view == 'cleaning') {
                $cleaning = DB::table('log_cleanings')
                    ->join('form_cleanings', 'form_cleanings.form_c_id', '=', 'log_cleanings.form_c_id')
                    ->where('log_cleanings.role_to', '=', $role)
                    ->where('log_cleanings.aktif', '=', 1)
                    ->select('form_cleanings.*')
                    ->get();
                return view('hasil_cleaning', ['cleaning' => $cleaning]);
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
            $cleaningLog = DB::table('log_cleanings')
                ->join('form_cleanings', 'form_cleanings.form_c_id', '=', 'log_cleanings.form_c_id')
                ->select('log_cleanings.*', 'form_cleanings.cleaning_work', 'form_cleanings.validity_from')
                ->get();
            return view('log_cleaning', ['cleaningLog' => $cleaningLog]);
        }
    }

    public function approval_full($type_form)
    {
        if ((Auth::user()->role == 'head') || (Auth::user()->role == 'check') || (Auth::user()->role == 'review')) {
            if ($type_form == 'all') {
                return view('full_approval');
            } elseif ($type_form == 'survey') {
                $surveyFull = DB::table('survey_fulls')->get();
                return view('full_survey', ['surveyFull' => $surveyFull]);
            } elseif ($type_form == 'cleaning') {
                $cleaningFull = DB::table('full_cleanings')->get();
                return view('full_cleaning', ['cleaningFull' => $cleaningFull]);
            }
        }
    }
}
