<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use validitor;
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
    public function show_maintenance_checkin($id) // Menampilkan form maintenance untuk view checkin
    {
        $form = Other::findOrFail($id);
        $survey_personil = SurveyPersonil::where('survey_id', $id)->get();
        $personil = Visitor::all();

        $pic = [];
        foreach ($other_personil as $k => $nama) {
            $data_nama = [];
            if (isset($survey_personil[$k])) {
                $data_nama = [
                    'name' => $nama['visitor_name'],
                    'company' => $nama['visitor_company'],
                    'department' => $nama['visitor_dept'],
                    'respon' => $nama['visitor_respon'],
                    'phone' => $nama['visitor_phone'],
                    'number' => $nama['id_number'],
                ];
                $pic[] = $data_nama;
            }
        }
        return view('other.maintenance_checkin', compact('form', 'personil', 'pic'));
    }

    public function store(Request $request)
    {
         // Get all data request
         $data = $request->all();
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
        $request->all();
        $survey_form = Survey::create([
            'visit' => $request->date_of_visit,
            'leave' => $request->date_of_leave,
            'name_req' => $request->nama_requestor,
            'phone_req' => $request->phone_requestor,

        ]);

        $p = [];

        foreach ($data['visitor_name'] as $k => $v) {
            $detail_array=[];
            if (isset($data['visitor_name'][$k])) {
                $detail_array = [
                    'Survey_id' => $survey_form->id,
                    'name' => $data[ 'visitor_name'][$k],
                    'company' => $data['visitor_company'][$k],
                    'department' => $data['visitor_dept'][$k],
                    'numberid' => $data['id_number'][$k],
                    'phone' => $data['visitor_phone'][$k],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $insert_detail[] = $detail_array;

            }
        }

        // $survey_ = SurveyPersonil::insert($p);
        // // $notif_email = Other::find
        // // Send email notification
        // foreach ([
        //     'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
        //     'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
        // ] as $recipient) {
        //     Mail::to($recipient)->send(new NotifMaintenanceForm($surveyForm));
        // }

        // if ($personil) {
        //     $log = SurveyHistorys::insert([
        //         'other_id' => $surveyForm->id,
        //         'created_by' => Auth::user()->name,
        //         'role_to' => 'review',
        //         'status' => 'requested',
        //         'aktif' => true,
        //         'pdf' => false,
        //         'updated_at' => now(),
        //         'created_at' => now(),
        //     ]);

        //     return $log ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        // }
    }

    public function approve_survey(Request $request) // Flow Approval form survey
    {
        $lastupdate = SurveyrHistory::where('Survey_id', '=', $request->survey_id)->latest()->first();
        if ($lastupdate->pdf == true) {
            $lastupdate->update(['aktif' => false]);

            // Perubahan status tiap permit
            $status = '';
            if ($lastupdate->status == 'requested') {
                $status = 'reviewed';
            } elseif ($lastupdate->status == 'reviewed') {
                $status = 'checked';
            } elseif ($lastupdate->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($lastupdate->status == 'acknowledge') {
                $status = 'final';
            } elseif ($lastupdate->status == 'final') {
                $full_survey = Survey::find($request->survey_id)->first();
            }

            $notif_email = Survey::find($lastupdate->Survey_id);
            // // Pergantian  role tiap permit & send email notif
            $role_to = '';
            if ($lastupdate->role_to == 'review') {
                foreach ([
                    'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                    'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifMaintenanceForm($notif_email));
                }
                $role_to = 'check';
            } elseif ($lastupdate->role_to == 'check') {
                foreach (['security.bacep@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifMaintenanceForm($notif_email));
                }
                $role_to = 'security';
            } elseif ($lastupdate->role_to == 'security') {
                foreach (['tofiq.hidayat@balitower.co.id', 'bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifMaintenanceForm($notif_email));
                }
                $role_to = 'head';
            } elseif ($lastupdate->role_to = 'head') {
                $full = Other::find($request->other_id);
                foreach (['dc@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifMaintenanceFull($full));
                }
                $role_to = 'all';

                $full_maintenance = Other::where('id', $request->other_id)->first();
                // dd($full_maintenance);
                $full_approve = OtherFull::create([
                    'other_id' => $full_maintenance->id,
                    'work' => $full_maintenance->work,
                    'request' => $full_maintenance->created_at,
                    'visit' => $full_maintenance->visit,
                    'leave' => $full_maintenance->leave,
                    'link' => ("https://dcops.balifiber.id/other/maintenance/pdf/$full_maintenance->id"),
                    'note' => null,
                    'status' => 'Full Approved',
                ]);
            }

            // Simpan tiap perubahan permit ke table CLeaningHistory
            $surveyHistory = SurveyHistory::create([
                'other_id' => $request->Survey_id,
                'created_by' => Auth::user()->name,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);
        } else {
            abort(403);
        }
        return $surveyHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function reject_survey(Request $request) // Untuk reject permit maintenance
    {
        // Get permit terbaru by ID Permit
        $lastupdate = SUrveyHistory::where('survey_id', '=', $request->survey_id)->latest()->first();
        if (Gate::denies('isSecurity')) {
            if ($lastupdate->pdf == true) {
                $lastupdate->update(['aktif' => false]);

                // Simpan tiap perubahan permit ke table CleaningHistory
                $history = SurveyHistory::create([
                    'other_id' => $request->survey_id,
                    'created_by' => Auth::user()->name,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // Get permit yang di reject & kirim notif email
                $survey_reject = Other::find($request->other_id);
                foreach ([ 'bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifMaintenanceReject($survey_reject));
                }
                return $history->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(403);
            }
        }
    }

    public function update_reject_survey(Request $request, $id) // Untuk reject ketika sudah full approval versi visitor
    {
        $survey_full = SurveyFull::where('survey_id', $id)->first();
        $update_reject = SurveyHistory::where('survey_id', $id)->where('aktif', 1)->first();

        $update_reject->update([
            'aktif' => false,
        ]);

        // Simpan perubahan tiap permit ke table OtherHistory
        $update_reject = SurveyrHistory::create([
            'survey_id' => $id,
            'created_by' => Auth::user()->name,
            'role_to' => 0,
            'status' => 'Full Rejected',
            'aktif' => true,
            'pdf' => false,
        ]);

        // Update alasan reject di colum note
        $survey_full->update([
            'status' => 'Full Rejected',
            'note' => $request->note,
        ]);

        if (($update_reject) && ($survey_full)) {
            return redirect('logall')->with('status', 'Berhasil di Reject!');
        } else {
            return redirect('logall')->with('status', 'gagal');
        }
    }

    public function update_checkin_survey(Request $request) // Untuk update checkin personil form maintenance
    {
        dd($request->all());
        $validate = $request->validate([
            'visit' => ['required'],
            'leave' => ['required', 'after_or_equal:visit'],
        ]);
    }

}