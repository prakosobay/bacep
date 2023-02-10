<?php

namespace App\Http\Controllers;

use App\Exports\CleaningFullApprovalExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Mail, Storage, Gate};
use Illuminate\Support\{Str, Carbon};
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{MasterOb, PilihanWork, Cleaning, CleaningHistory, CleaningFull, PenomoranCleaning};
use Yajra\Datatables\Datatables;

class CleaningController extends Controller
{

    // Show Pages
    public function show_form() // Tampilan form cleaning
    {
        $master_ob = MasterOb::all();
        $pilihanwork = PilihanWork::all();
        return view('cleaning.form', compact('master_ob', 'pilihanwork'));
    }

    public function review_arcr($id)
    {
        if(Gate::denies('isVisitor')){

            $cleaning = Cleaning::findOrFail($id);
            $name1 = MasterOb::where('nama', $cleaning->cleaning_name)->select('ob_id')->first();
            $name2 = MasterOB::where('nama', $cleaning->cleaning_name2)->select('ob_id')->first();
            $master_ob = MasterOb::all();
            $auth = auth()->user()->slug;

            $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();

            $log = DB::table('cleaning_histories')
                ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
                ->where('cleaning_histories.cleaning_id', '=', $id)
                ->where('cleaning_histories.status', '!=', 'visitor')
                ->select('cleaning_histories.*', 'users.name', 'created_by')
                ->get();

            return view('cleaning.reviewARCR', compact('cleaning', 'master_ob', 'name1', 'name2', 'log', 'lasthistoryC', 'auth'));
        } else {
            abort(403);
        }
    }

    public function checkin_form_cleaning($id) // Tampilan form cleaning untuk CHECKIN
    {
        $getForm = Cleaning::findOrFail($id);
        $getOb = MasterOb::all();
        return view('cleaning.checkinForm', compact('getForm', 'getOb'));
    }

    public function checkout_form_cleaning($id) // Tampilan form cleaning untuk CHECKOUT
    {
        $getForm = Cleaning::findOrFail($id);
        $getFull = CleaningFull::where('cleaning_id', $id)->first();
        return view('cleaning.checkoutForm', compact('getForm', 'getFull'));
    }

    public function show_reject_cleaning() // List Permit Cleaning Reject
    {
        return view('cleaning.listReject');
    }

    public function detail_permit_cleaning($id) // List history TIAP PERMIT
    {
        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->select('cleaning_histories.*', 'users.name', 'cleanings.cleaning_work')
            ->get();
        return view('detail_cleaning', compact('cleaningHistory'));
    }



    //Collect Data from DB
    public function detail_ob($id) // Get ALL data personil OB
    {
        $data = MasterOb::find($id);
        return isset($data) && !empty($data) ? response()->json(['status' => 'SUCCESS', 'data' => $data]) : response()->json(['status' => 'FAILED', 'data' => []]);
    }

    public function pilihan_work($id) // Get ALL purpose of work cleaning
    {
        $permit = PilihanWork::find($id);
        return isset($permit) && !empty($permit) ? response()->json(['status' => 'SUCCESS', 'permit' => $permit]) : response(['status' => 'FAILED', 'permit' => []]);
    }



    // Submit Data
    public function submit_data_cleaning(Request $request) // Submit form cleaning
    {
        $data = $request->all();

        // Convert id work & id nama
        $data['cleaning_name'] = MasterOb::find($data['cleaning_name'])->nama;
        $data['cleaning_name2'] = MasterOb::find($data['cleaning_name2'])->nama;
        $data['cleaning_work'] = PilihanWork::find($data['cleaning_work'])->work;

        DB::beginTransaction();

        try {

            // Insert data yang diterima ke table Cleaning
            $cleaning = Cleaning::create($data);

            // Send email notification
            foreach ([
                'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id', 'syukril@balitower.co.id', 'dennis.oscadifa@balitower.co.id',
                'ilham.pangestu@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'badai.sino@balitower.co.id',
                'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id', 'riya.ully@balitower.co.id',
            ] as $recipient) {
                Mail::to($recipient)->send(new NotifEmail($cleaning));
            }

            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => true
            ]);

            DB::commit();

            return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function approve_cleaning(Request $request, $id) // Flow Approval Permit Cleaning
    {
        // Get permit terbaru by ID Permit
        $data = $request->all();
        $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->latest()->first();

        DB::beginTransaction();

        try {
            $data['cleaning_name'] = MasterOb::find($data['cleaning_name'])->nama;
            $data['cleaning_name2'] = MasterOb::find($data['cleaning_name2'])->nama;

            $update = Cleaning::findOrFail($id);
            $update->update([
                'cleaning_time_start' => $request->time_start,
                'cleaning_time_start2' => $request->time_start2,
                'cleaning_time_start3' => $request->time_start3,
                'cleaning_time_start4' => $request->time_start4,
                'cleaning_time_start5' => $request->time_start5,
                'cleaning_time_start6' => $request->time_start6,
                'cleaning_time_end' => $request->time_end,
                'cleaning_time_end2' => $request->time_end2,
                'cleaning_time_end3' => $request->time_end3,
                'cleaning_time_end4' => $request->time_end4,
                'cleaning_time_end5' => $request->time_end5,
                'cleaning_time_end6' => $request->time_end6,
                'activity' => $request->activity,
                'activity2' => $request->activity2,
                'activity3' => $request->activity3,
                'activity4' => $request->activity4,
                'activity5' => $request->activity5,
                'activity6' => $request->activity6,
                'detail_service' => $request->detail_service,
                'detail_service2' => $request->detail_service2,
                'detail_service3' => $request->detail_service3,
                'detail_service4' => $request->detail_service4,
                'detail_service5' => $request->detail_service5,
                'detail_service6' => $request->detail_service6,
                'item' => $request->item,
                'item2' => $request->item2,
                'item3' => $request->item3,
                'item4' => $request->item4,
                'item5' => $request->item5,
                'item6' => $request->item6,
                'cleaning_procedure' => $request->cleaning_procedure,
                'cleaning_procedure2' => $request->cleaning_procedure2,
                'cleaning_procedure3' => $request->cleaning_procedure3,
                'cleaning_procedure4' => $request->cleaning_procedure4,
                'cleaning_procedure5' => $request->cleaning_procedure5,
                'cleaning_procedure6' => $request->cleaning_procedure6,
                'cleaning_risk' => $request->cleaning_risk,
                'cleaning_risk2' => $request->cleaning_risk2,
                'cleaning_risk3' => $request->cleaning_risk3,
                'cleaning_risk4' => $request->cleaning_risk4,
                'cleaning_risk5' => $request->cleaning_risk5,
                'cleaning_risk6' => $request->cleaning_risk6,
                'cleaning_possibility' => $request->cleaning_possibility,
                'cleaning_possibility2' => $request->cleaning_possibility2,
                'cleaning_possibility3' => $request->cleaning_possibility3,
                'cleaning_possibility4' => $request->cleaning_possibility4,
                'cleaning_possibility5' => $request->cleaning_possibility5,
                'cleaning_possibility6' => $request->cleaning_possibility6,
                'cleaning_impact' => $request->cleaning_impact,
                'cleaning_impact2' => $request->cleaning_impact2,
                'cleaning_impact3' => $request->cleaning_impact3,
                'cleaning_impact4' => $request->cleaning_impact4,
                'cleaning_impact5' => $request->cleaning_impact5,
                'cleaning_impact6' => $request->cleaning_impact6,
                'cleaning_mitigation' => $request->cleaning_mitigation,
                'cleaning_mitigation2' => $request->cleaning_mitigation2,
                'cleaning_mitigation3' => $request->cleaning_mitigation3,
                'cleaning_mitigation4' => $request->cleaning_mitigation4,
                'cleaning_mitigation5' => $request->cleaning_mitigation5,
                'cleaning_mitigation6' => $request->cleaning_mitigation6,
                'cleaning_background' => $request->background,
                'cleaning_describ' => $request->describ,
                'cleaning_testing' => $request->testing,
                'cleaning_rollback' => $request->rollback,
                'validity_from' => $request->validity_from,
                'validity_to' => $request->validity_to,
                'cleaning_name' => $data['cleaning_name'],
                'cleaning_name2' => $data['cleaning_name2'],
                'cleaning_number' => $request->cleaning_number,
                'cleaning_number2' => $request->cleaning_number2,
                'cleaning_nik' => $request->cleaning_nik,
                'cleaning_nik_2' => $request->cleaning_nik_2,
            ]);

            $lasthistoryC->update(['aktif' => false]);

            // Perubahan status tiap permit
            $status = '';
            if ($lasthistoryC->status == 'requested') {
                $status = 'reviewed';
            } elseif ($lasthistoryC->status == 'reviewed') {
                $status = 'checked';
            } elseif ($lasthistoryC->status == 'checked') {
                $status = 'acknowledge';
            } elseif ($lasthistoryC->status == 'acknowledge') {
                $status = 'final';
            }

            $cleaning = Cleaning::findOrFail($id);
            // Pergantian role tiap permit & send email notif
            $role_to = '';
            if ($lasthistoryC->role_to == 'review') {
                foreach ([
                    'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id', 'syukril@balitower.co.id', 'dennis.oscadifa@balitower.co.id',
                    'ilham.pangestu@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
                    'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail($cleaning));
                }
                $role_to = 'check';
            } elseif ($lasthistoryC->role_to == 'check') {
                foreach ([
                    'security.bacep@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail($cleaning));
                }
                $role_to = 'security';
            } elseif ($lasthistoryC->role_to == 'security') {
                foreach (['mufli.gonibala@balitower.co.id', 'tofiq.hidayat@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail($cleaning));
                }
                $role_to = 'head';
            } elseif ($lasthistoryC->role_to == 'head') {

                // Send Email
                foreach (['dc@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifFull($cleaning));
                }

                $role_to = 'all';

                // Simpan permit yang sudah full approved ke table CleaningFull
                CleaningFull::create([
                    'cleaning_id' => $cleaning->cleaning_id,
                    'cleaning_name' => $cleaning->cleaning_name,
                    'cleaning_name2' => $cleaning->cleaning_name2,
                    'cleaning_work' => $cleaning->cleaning_work,
                    'validity_from' => $cleaning->validity_from,
                    'date_of_leave' => $cleaning->date_of_leave,
                    'cleaning_date' => $cleaning->created_at,
                    'link' => ("https://dcops.balifiber.id/cleaning_pdf/$cleaning->cleaning_id"),
                    // 'link' => ("http://localhost:8000/cleaning_pdf/$cleaning->cleaning_id"),
                ]);
            }
            // Simpan tiap perubahan permit ke table CleaningHistory
            CleaningHistory::create([
                'cleaning_id' => $id,
                'created_by' => Auth::user()->id,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => true,
            ]);

            DB::commit();
            return redirect()->route('approvalView', 'cleaning')->with('success', 'Approved!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function reject_cleaning(Request $request, $id) // Reject permit Cleaning
    {
        $request->validate([
            'note' => ['required', 'string', 'max:255'],
        ]);

        $note = $request->note;

        // Get permit terbaru by ID Permit
        $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->latest()->first();
        $cleaning = Cleaning::findOrFail($id);
        DB::beginTransaction();

        try {

            $lasthistoryC->update(['aktif' => false]);

            // Simpan tiap perubahan permit ke table CleaningHistory
            CleaningHistory::create([
                'cleaning_id' => $id,
                'created_by' => Auth::user()->id,
                'role_to' => 0,
                'status' => 'rejected',
                'aktif' => true,
                'pdf' => true,
            ]);

            DB::commit();

            foreach (['badai.sino@balitower.co.id', 'riya.ully@balitower.co.id'] as $recipient) {
                Mail::to($recipient)->send(new NotifReject($cleaning, $note));
            }
            return redirect()->route('approvalView', 'cleaning')->with('success', 'Rejected!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function checkin_cancel($id) // Cancel Permit jika sudah full approved tapi gajadi jalan
    {
        DB::beginTransaction();

        try {

            $getStatus = CleaningFull::where('cleaning_id', $id)->first();
            $getStatus->update([
                'status' => 'Cancel',
            ]);

            DB::commit();
            return redirect()->route('logall')->with('success', 'Canceled');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', "Gagal Cancel");
        }
    }


    // penomoran
    public function penomoran()
    {
        $getNomor = PenomoranCleaning::all();
        return view('cleaning.penomoran', compact('getNomor'));
    }


    // Checkin Checkout
    public function checkin_update_cleaning(Request $request, $id) // Proses checkin
    {
        $data = ($request->all());
        $jumlah_char_pic1 = strlen($data['cleaning_name']);
        $jumlah_char_pic2 = strlen($data['cleaning_name2']);

        if (($jumlah_char_pic1 < 3) && ($jumlah_char_pic2 < 3)) {
            $data['cleaning_name'] = MasterOb::find($data['cleaning_name'])->nama;
            $data['cleaning_name2'] = MasterOb::find($data['cleaning_name2'])->nama;
        } elseif (($jumlah_char_pic1 < 3) && ($jumlah_char_pic2 > 3)) {
            $data['cleaning_name'] = MasterOb::find($data['cleaning_name'])->nama;
        } elseif (($jumlah_char_pic1 > 3) && ($jumlah_char_pic2 < 3)) {
            $data['cleaning_name2'] = MasterOb::find($data['cleaning_name2'])->nama;
        }

        // Validasi form cleaning pada checkin
        $request->validate([
            'cleaning_name' => ['required', 'string'],
            'cleaning_name2' => ['required', 'string'],
            'cleaning_number' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'cleaning_number2' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'cleaning_nik' => ['required', 'numeric'],
            'cleaning_nik_2' => ['required', 'numeric'],
            'photo_personil' => ['required'],
            'checkin_personil' => ['required'],
            'photo_personil2' => ['required'],
            'checkin_personil2' => ['required'],
        ]);

        $getFull = CleaningFull::where('cleaning_id', $id)->first();
        $getCleaning = Cleaning::where('cleaning_id', $id)->first();

        $getImage = $data['photo_personil'];
        $getImage2 = $data['photo_personil2'];

        // image1
        $extension = explode('/', explode(':', substr($getImage, 0, strpos($getImage, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($getImage, 0, strpos($getImage, ',') + 1);
        $image = str_replace($replace, '', $getImage);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.' . $extension;

        // image2
        $extension2 = explode('/', explode(':', substr($getImage2, 0, strpos($getImage2, ';')))[1])[1];   // .jpg .png .pdf
        $replace2 = substr($getImage2, 0, strpos($getImage2, ',') + 1);
        $image2 = str_replace($replace2, '', $getImage2);
        $image2 = str_replace(' ', '+', $image2);
        $imageName2 = time() . '.' . $extension2;

        // simpan gambar
        Storage::disk('cleaningCheckin')->put($imageName, base64_decode($image));
        Storage::disk('cleaningCheckin')->put($imageName2, base64_decode($image2));

        DB::beginTransaction();

        try {

            $getFull->update([
                'cleaning_name' => $data['cleaning_name'],
                'cleaning_name2' => $data['cleaning_name2'],
                'photo_checkin_personil' => $imageName,
                'photo_checkin_personil2' => $imageName2,
                'checkin_personil' => $data['checkin_personil'],
                'checkin_personil2' => $data['checkin_personil2'],
            ]);

            $getCleaning->update([
                'cleaning_name' => $data['cleaning_name'],
                'cleaning_name2' => $data['cleaning_name2'],
                'cleaning_number' => $data['cleaning_number'],
                'cleaning_number2' => $data['cleaning_number2'],
                'cleaning_nik' => $data['cleaning_nik'],
                'cleaning_nik_2' => $data['cleaning_nik_2'],
            ]);

            DB::commit();

            return redirect()->route('logall')->with('status', 'Checkin Berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function checkout_update_cleaning(Request $request, $id) // Proses checkout
    {
        $data = $request->all();

        $request->validate([
            'photo_personil' => ['required'],
            'photo_personil2' => ['required'],
            'checkout_personil' => ['required'],
            'checkout_personil2' => ['required'],
        ]);

        $getImage = $data['photo_personil'];
        $getImage2 = $data['photo_personil2'];

        // convert image1
        $extension = explode('/', explode(':', substr($getImage, 0, strpos($getImage, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($getImage, 0, strpos($getImage, ',') + 1);
        $image = str_replace($replace, '', $getImage);
        $image = str_replace(' ', '+', $image);
        $imageName = time() . '.' . $extension;

        //convert image2
        $extension2 = explode('/', explode(':', substr($getImage2, 0, strpos($getImage2, ';')))[1])[1];   // .jpg .png .pdf
        $replace2 = substr($getImage2, 0, strpos($getImage2, ',') + 1);
        $image2 = str_replace($replace2, '', $getImage2);
        $image2 = str_replace(' ', '+', $image2);
        $imageName2 = time() . '.' . $extension2;

        // simpan gambar
        Storage::disk('cleaningCheckout')->put($imageName, base64_decode($image));
        Storage::disk('cleaningCheckout')->put($imageName2, base64_decode($image2));

        $getFullCheckout = CleaningFull::where('cleaning_id', $id)->first();
        $pic = $getFullCheckout->cleaning_id;

        $last = DB::table('penomoran_cleanings')->latest()->first();
        $penomoran = DB::table('penomoran_cleanings')->where('type', 'cleaning')->latest()->first();

        DB::beginTransaction();

        try {

            $getFullCheckout->update([
                'checkout_personil' => $data['checkout_personil'],
                'checkout_personil2' => $data['checkout_personil2'],
                'photo_checkout_personil' => $imageName,
                'photo_checkout_personil2' => $imageName2,
                'status' => 'Full Approved',
            ]);

            // if($last == null){

            //     $ar = 1;
            //     $cr = 1;

            // } elseif($last) {

            //     $ar = $last->number_ar + 1;
            //     $cr = $last->number_cr + 1;

            //     $lastyearAR = $last->year_ar;
            //     $lastyearCR = $last->year_cr;
            //     $currrentYear = date('Y');

            //     if ( ($currrentYear != $lastyearAR) && ( $currrentYear != $lastyearCR ) ){
            //         $ar = 1;
            //         $cr = 1;
            //     }
            // }

            // PenomoranCleaning::firstOrCreate([
            //     'number_ar' => $ar,
            //     'month_ar' => date('m'),
            //     'year_ar' => date('Y'),
            //     'number_cr' => $cr,
            //     'month_cr' => date('m'),
            //     'year_cr' => date('Y'),
            //     'type' => 'cleaning',
            //     'permit_id' => $pic,
            // ]);

            DB::commit();

            return redirect()->route('logall')->with('status', 'Checkout Berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }
    }

    public function reject_full_cleaning(Request $request, $id) // Reject permit ketika sudah full approval
    {
        $getLog = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();
        $getFull = CleaningFull::where('cleaning_id', $id)->first();

        $getLog->update(['aktif' => false]);

        $getLog = CleaningHistory::create([
            'cleaning_id' => $id,
            'created_by' => Auth::user()->id,
            'role_to' => 0,
            'status' => 'Full Rejected',
            'aktif' => true,
            'pdf' => false,
        ]);

        $getFull->update([
            'note' => $request->note,
            'status' => 'Rejected',
        ]);

        if (($getLog) && ($getFull)) {
            return redirect('logall')->with('status', 'Berhasil di Reject!');
        } else {
            return redirect('logall')->with('status', 'gagal');
        }
    }



    // Convert PDF
    public function cetak_cleaning_pdf($id) // convert to pdf
    {
        DB::beginTransaction();

        try {

            $cleaning = Cleaning::find($id);
            $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();

            $cleaningHistory = DB::table('cleaning_histories')
                ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
                ->where('cleaning_histories.cleaning_id', '=', $id)
                ->where('cleaning_histories.status', '!=', 'visitor')
                ->select('cleaning_histories.*', 'users.name', 'created_by', 'users.department', 'users.phone')
                ->get();

            $penomoran = PenomoranCleaning::where('permit_id', $id)->where('type', 'cleaning')->first();
            $pdf = PDF::loadview('cleaning_pdf', compact('cleaning', 'cleaningHistory', 'lasthistoryC', 'penomoran'))->setPaper('a4', 'portrait')->setWarnings(false);
            return $pdf->stream();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('failed', $e->getMessage());
        }

    }

    public function cetak_full_cleaning($id) //versi visitor
    {
        $getCleaning = Cleaning::findOrFail($id);
        $getLastLog = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();
        $getFull = CleaningFull::where('cleaning_id', $id)->first();

        $getLog = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->select('cleaning_histories.*', 'users.name', 'created_by')
            ->get();

        $pdf = PDF::loadview('cleaning.fullpdf', compact('getCleaning', 'getLastLog', 'getFull', 'getLog'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function cetak_all_full_cleaning()
    {
        $getCleaning = CleaningFull::where('note', null)->get();
        $pdf = PDF::loadview('cleaning.export_full_pdf', compact('getCleaning'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
    }


    // Datatable Yajra
    public function yajra_full_approval() //versi approval
    {
        $getFull = DB::table('cleaning_fulls')
            ->where('note', null)
            ->select(['cleaning_id', 'validity_from', 'cleaning_name', 'checkin_personil', 'checkout_personil', 'cleaning_work', 'link', 'photo_checkin_personil', 'photo_checkout_personil']);
        return Datatables::of($getFull)
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';
            })
            ->orderColumn('cleaning_id', '-cleaning_id $1')
            ->addColumn('action', 'cleaning.actionLink')
            ->addColumn('image', function ($data) {
                $url = asset("storage/bm/cleaning/checkin/{$data->photo_checkin_personil}");
                return $url;
            })
            ->toJson();
    }

    public function yajra_log() //versi visitor
    {
        $full = DB::table('cleaning_fulls')
            ->select(['cleaning_id', 'validity_from', 'cleaning_name', 'cleaning_work', 'checkin_personil', 'checkout_personil'])
            ->where('cleaning_fulls.status', '!=', 'Cancel');
        return Datatables::of($full)
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';
            })
            ->orderColumn('cleaning_id', '-cleaning_id $1')
            ->addColumn('action', 'cleaning.actionEdit')
            ->make(true);
    }

    public function data_reject_cleaning() //versi visitor
    {
        $getFull = DB::table('cleaning_fulls')
            ->select(['cleaning_id', 'validity_from', 'cleaning_name', 'cleaning_work', 'note'])
            ->where('note', '!=', null)
            ->orderBy('cleaning_id', 'desc');
        return Datatables::of($getFull)
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function data_history() //versi approval
    {
        $cleaning_log = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->select('cleaning_histories.*', 'cleanings.validity_from')
            ->orderBy('cleaning_id', 'desc');
        return Datatables::of($cleaning_log)
            ->editColumn('validity_from', function ($cleaning_log) {
                return $cleaning_log->validity_from ? with(new Carbon($cleaning_log->validity_from))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function cleaning_yajra_log()
    {
        $cleaning_log = DB::table('cleanings')
            ->select('cleanings.validity_from', 'cleanings.cleaning_name', 'cleanings.cleaning_work')
            ->orderBy('cleaning_id', 'desc');
        return Datatables::of($cleaning_log)
            ->editColumn('updated_at', function ($cleaning_log) {
                return $cleaning_log->updated_at ? with(new Carbon($cleaning_log->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('validity_from', function ($cleaning_log) {
                return $cleaning_log->validity_from ? with(new Carbon($cleaning_log->validity_from))->format('d/m/Y') : '';
            })
            ->make(true);
    }

    public function yajra_finished()
    {
        $query = DB::table('cleanings')
            ->join('cleaning_fulls', 'cleanings.cleaning_id', '=', 'cleaning_fulls.cleaning_id')
            ->select('cleanings.visit', 'cleanings.leave', 'cleanings.work', 'cleaning_fulls.*')
            ->where('cleaning_fulls.status', 'Full Approved');
        Datatables::of($query);
    }



    //Export Excel
    public function export_full_approval()
    {
        return Excel::download(new CleaningFullApprovalExport, 'Cleaning Full Approval.xlsx');
    }
}
