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
        return view('home');
    }

    // ---------- SURVEY ----------
    public function submit_data_survey(Request $request)
    {
        if (Auth::user()->role == 'visitor')
            $survey = Survey::create($request->all());
        if ($survey->exists) {
            $surveyHistory = SurveyHistory::create([
                'survey_id' => $survey->survey_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'created',
                'aktif' => 1
            ]);

            return $surveyHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return response()->json(['status' => 'FAILED']);
    }

    public function approval_view($type_view)
    {

        $role = Auth::user()->role;
        if ((Auth::user()->role == 'Head Dept.') || (Auth::user()->role == 'check') || (Auth::user()->role == 'review') || (Auth::user()->role == 'security'))
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
                $cleaning = DB::table('cleaning_histories')
                    ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                    ->where('cleaning_histories.role_to', '=', $role)
                    ->where('cleaning_histories.aktif', '=', 1)
                    ->select('cleanings.*')
                    ->get();
                return view('hasil_cleaning', ['cleaning' => $cleaning]);
            }
    }

    public function approval_full($type_form)
    {
        if ((Auth::user()->role == 'Head Dept.') || (Auth::user()->role == 'check') || (Auth::user()->role == 'review')) {
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

    public function detail_permit_survey($id)
    {
        $surveyHistory = DB::table('survey_histories')
            ->join('survey', 'survey.survey_id', '=', 'survey_histories.survey_id')
            ->join('users', 'users.id', '=', 'survey_histories.created_by')
            ->where('survey_histories.survey_id', '=', $id)
            ->select('survey_histories.*', 'users.name', 'survey.purpose_work')
            ->get();
        // dd($surveyHistory);

        return view('detail_survey', ['surveyHistory' => $surveyHistory]);
    }

    public function cetak_survey_pdf($id)
    {
        $survey = Survey::find($id);
        $lasthistory = SurveyHistory::where('survey_id', $id)->where('aktif', 1)->first();
        // $surveyHistory = SurveyHistory::join('')->where('survey.survey_id', $id)->where('status', )->orderBy('survey_history', 'ASC')->findAll();
        $surveyHistory = DB::table('survey_histories')
            ->join('survey', 'survey.survey_id', '=', 'survey_histories.survey_id')
            ->join('users', 'users.id', '=', 'survey_histories.created_by')
            // ->join('users', 'users.id', '=', 'survey_histories.name')
            ->where('survey_histories.survey_id', '=', $id)
            ->where('survey_histories.role_to', '!=', '0')
            ->where('survey_histories.role_to', '!=', 'check')
            ->where('survey_Histories.status', '!=', 'reviewed')
            ->where('survey_Histories.status', '!=', 'checked')
            ->select('survey_histories.*', 'users.name', 'created_by')
            ->get();
        // dd($surveyHistory);
        // $user = Users::where('id', $id)->where('name', $name)->get();

        $pdf = PDF::loadview('survey_pdf', ['survey' => $survey, 'lasthistory' => $lasthistory, 'surveyHistory' => $surveyHistory]);
        return $pdf->stream();
    }

    public function survey_reject(Request $request)
    {
        $lasthistory = SurveyHistory::where('survey_id', '=', $request->survey_id)->latest()->first();
        if ($lasthistory->role_to != 'security') {
            $lasthistory->update(['aktif' => false]);

            $surveyHistory = SurveyHistory::create([
                'survey_id' => $request->survey_id,
                'created_by' => Auth::user()->id,
                'role_to' => 0,
                'status' => 'rejected',
                'aktif' => true,
            ]);

            return $surveyHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }
    }

    public function approve_survey(Request $request)
    {

        // $lasthistory = SurveyHistory::where('survey_id', '=', $request->survey_id)->latest()->first();
        $lasthistory = SurveyHistory::where('survey_id', '=', $request->survey_id)->latest()->first();
        $lasthistory->update(['aktif' => false]);

        $status = '';
        if ($lasthistory->status == 'created') {
            $status = 'reviewed';
        } elseif ($lasthistory->status == 'reviewed') {
            $status = 'secured';
        } elseif ($lasthistory->status == 'secured') {
            $status = 'final';
        } elseif ($lasthistory->status == 'final') {
            $survey = Survey::find($request->survey_id)->first();
        }

        $role_to = '';
        if ($lasthistory->role_to == 'review') {
            $role_to = 'security';
        } elseif ($lasthistory->role_to == 'security') {
            $role_to = 'boss';
        }

        $surveyHistory = SurveyHistory::create([
            'survey_id' => $request->survey_id,
            'created_by' => Auth::user()->id,
            'role_to' => $role_to,
            'status' => $status,
            'aktif' => true,
        ]);

        if ($lasthistory->role_to == 'boss') {
            $survey = Survey::where('survey_id', $request->survey_id)->first();
            // dd($survey);
            $surveyFull = SurveyFull::create([
                'survey_id' => $survey->survey_id,
                'visitor_name' => $survey->visitor_name,
                'visitor_company' => $survey->visitor_company,
                'purpose_work' => $survey->purpose_work,
                'status' => 'Full Approved',
                'link' =>  url("/survey_pdf/$survey->survey_id"),
            ]);
        }

        return $surveyHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    // ---------- TROUBLESHOOT ----------
    public function submit_troubleshoot(Request $request)
    {
        $troubleshoot = Troubleshoot::create($request->all());

        if ($troubleshoot->exists) {
            $troubleshootHistory = TroubleshootHistory::create([
                'troubleshoot_id' => $troubleshoot->troubleshoot_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'created',
                'aktif' => 1
            ]);

            return $troubleshootHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return $troubleshoot->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }


    public function submit_mounting(Request $request)
    {
        $mounting = Mounting::create($request->all());
        if ($mounting->exists) {
            $mountingHistory = MountingHistory::create([
                'mounting_id' => $mounting->id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'created',
                'aktif' => 1
            ]);

            return $mountingHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return $mounting->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function submit_data(Request $request)
    {
        $maintenance = Maintenance::create($request->all());
        if ($maintenance->exists) {
            $maintenanceHistory = MaintenanceHistory::create([
                'maintenance_id' => $maintenance->maintenance_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'created',
                'aktif' => 1
            ]);

            return $maintenanceHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return response()->json(['status' => 'FAILED']);
    }

    public function detail_permit_maintenance($id)
    {
        $maintenanceHistory = DB::table('maintenance_histories')
            ->join('maintenance', 'maintenance.maintenance_id', '=', 'maintenance_histories.maintenance_id')
            ->join('users', 'users.id', '=', 'maintenance_histories.created_by')
            ->where('maintenance_histories.maintenance_id', '=', $id)
            ->select('maintenance_histories.*', 'users.name', 'maintenance.*')
            ->get();
        return view('detail_maintenance', ['maintenanceHistory' => $maintenanceHistory]);
    }

    public function maintenance_view()
    {
        // $maintenance = Maintenance::all();
        $role = Auth::user()->role;

        $maintenance = DB::select("SELECT
            MAX( maintenance_histories.maintenance_history_id ) as maintenance_history_id,
            `maintenance`.*
        FROM
            `maintenance_histories`
            INNER JOIN `maintenance` ON `maintenance`.`maintenance_id` = `maintenance_histories`.`maintenance_id`
        WHERE
        `maintenance_histories`.`role_to` = '$role' ");

        return view('hasil_maintenance', ['maintenance' => $maintenance]);
    }

    public function cetak_maintenance_pdf()
    {
        $maintenance = Maintenance::all();

        $pdf = PDF::loadview('maintenance_pdf', ['maintenance' => $maintenance]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }

    public function detail_permit_troubleshoot($id)
    {
        $troubleshootHistory = DB::table('troubleshoot_histories')
            ->join('troubleshoot', 'troubleshoot.troubleshoot_id', '=', 'troubleshoot_histories.troubleshoot_id')
            ->join('users', 'users.id', '=', 'troubleshoot_histories.created_by')
            ->where('troubleshoot_histories.troubleshoot_id', '=', $id)
            ->select('troubleshoot_histories.*', 'users.name', 'troubleshoot.*')
            ->get();
        return view('detail_troubleshoot', ['troubleshootHistory' => $troubleshootHistory]);
    }

    public function troubleshoot_view()
    {
        // $troubleshoot = Troubleshoot::all();
        $role = Auth::user()->role;

        $troubleshoot = DB::select("SELECT
            MAX( troubleshoot_histories.troubleshoot_history_id ) as troubleshoot_history_id,
            `troubleshoot`.*
        FROM
            `troubleshoot_histories`
            INNER JOIN `troubleshoot` ON `troubleshoot`.`troubleshoot_id` = `troubleshoot_histories`.`troubleshoot_id`
        WHERE
        `troubleshoot_histories`.`role_to` = '$role' ");

        return view('hasil_troubleshoot', ['troubleshoot' => $troubleshoot]);
    }

    public function cetak_troubleshoot_pdf($id)
    {
        $troubleshoot = Troubleshoot::find($id);

        $pdf = PDF::loadview('troubleshoot_pdf', ['troubleshoot' => $troubleshoot]);

        return $pdf->stream();
    }

    public function detail_permit_mounting($id)
    {
        $mountingHistory = DB::table('mounting_histories')
            ->join('mounting', 'mounting.mounting_id', '=', 'mounting_histories.mounting_id')
            ->join('users', 'users.id', '=', 'mounting_histories.created_by')
            ->where('mounting_histories.mounting_id', '=', $id)
            ->select('mounting_histories.*', 'users.name', 'mounting.*')
            ->get();
        return view('detail_mounting', ['mountingHistory' => $mountingHistory]);
    }

    public function mounting_view()
    {
        $role = Auth::user()->role;

        $mounting = DB::select("SELECT
            MAX( mounting_histories.mounting_history_id ) as mounting_history_id,
            `mounting`.*
        FROM
            `mounting_histories`
            INNER JOIN `mounting` ON `mounting`.`mounting_id` = `mounting_histories`.`mounting_id`
        WHERE
        `mounting_histories`.`role_to` = '$role' AND aktif = 1");

        return view('hasil_mounting', ['mounting' => $mounting]);
    }

    public function cetak_mounting_pdf()
    {
        $mounting = Mounting::all();

        $pdf = PDF::loadview('mounting_pdf', ['mounting' => $mounting]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }
}
