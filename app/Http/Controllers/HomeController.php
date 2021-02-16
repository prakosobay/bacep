<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\MaintenanceHistory;
use App\Models\Survey;
use App\Models\Troubleshoot;
use App\Models\Mounting;
use App\Models\MountingHistory;
use App\Models\SurveyHistory;
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

    public function submit_data(Request $request)
    {
        $maintenance = Maintenance::create($request->all());
        if ($maintenance->exists) {
            $maintenanceHistory = MaintenanceHistory::create([
                'maintenance_id' => $maintenance->maintenance_id,
                'created_by' => Auth::user()->id,
                'status' => 'created'
            ]);

            return $maintenanceHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return response()->json(['status' => 'FAILED']);
    }


    public function submit_data_survey(Request $request)
    {
        $survey = Survey::create($request->all());
        if ($survey->exists) {
            $surveyHistory = SurveyHistory::create([
                'survey_id' => $survey->survey_id,
                'created_by' => Auth::user()->id,
                'status' => 'created'
            ]);

            return $surveyHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return response()->json(['status' => 'FAILED']);
    }


    public function submit_troubleshoot(Request $request)
    {
        $troubleshoot = Troubleshoot::create($request->all());

        if ($troubleshoot->exists) {
            $troubleshootHistory = TroubleshootHistory::create([
                'troubleshoot_id' => $troubleshoot->troubleshoot_id,
                'created_by' => Auth::user()->id,
                'status' => 'created'
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
                'status' => 'created'
            ]);

            return $mountingHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        }

        return $mounting->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }



    public function surveyview()
    {
        // $survey = Survey::all();
        $survey = DB::table('survey')->paginate(20);
        return view('hasil_survey', ['survey' => $survey]);
    }

    public function cetak_survey_pdf()
    {
        $survey = Survey::all();

        $pdf = PDF::loadview('survey_pdf', ['survey' => $survey]);
        // return $pdf->download('laporan-survey-pdf');
        return $pdf->stream();
    }

    public function maintenance_view()
    {
        // $maintenance = Maintenance::all();
        $maintenance = DB::table('maintenance')->paginate(20);
        return view('hasil_maintenance', ['maintenance' => $maintenance]);
    }

    public function cetak_maintenance_pdf()
    {
        $maintenance = Maintenance::all();

        $pdf = PDF::loadview('maintenance_pdf', ['maintenance' => $maintenance]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }

    public function troubleshoot_view()
    {
        // $troubleshoot = Troubleshoot::all();
        $troubleshoot = DB::table('troubleshoot')->paginate(10);
        return view('hasil_troubleshoot', ['troubleshoot' => $troubleshoot]);
    }

    public function cetak_troubleshoot_pdf()
    {
        $troubleshoot = Troubleshoot::all();

        $pdf = PDF::loadview('troubleshoot_pdf', ['troubleshoot' => $troubleshoot]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }

    public function mounting_view()
    {
        // $mounting = Mounting::all();
        $mounting = DB::table('mounting')->paginate(20);

        return view('hasil_mount', ['mounting' => $mounting]);
    }

    public function cetak_mounting_pdf()
    {
        $mounting = Mounting::all();

        $pdf = PDF::loadview('mounting_pdf', ['mounting' => $mounting]);
        // return $pdf->download('laporan-pegawai-pdf');
        return $pdf->stream();
    }
}
