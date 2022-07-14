<?php

namespace App\Http\Controllers;

use App\Exports\LogCleaningExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\{NotifEmail, NotifReject, NotifFull};
use App\Models\{User, Role, MasterOb, PilihanWork, Cleaning, CleaningHistory, CleaningFull};
use phpDocumentor\Reflection\PseudoTypes\True_;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use Symfony\Component\CssSelector\Node\FunctionNode;

class CleaningController extends Controller
{


    // Show Pages
    public function show_form() // Tampilan form cleaning
    {
        $master_ob = MasterOb::all();
        $pilihanwork = PilihanWork::all();
        return view('cleaning.form', compact('master_ob', 'pilihanwork'));
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

        // Insert data yang diterima ke table Cleaning
        $cleaning = Cleaning::create($data);

        // Send email notification
        foreach ([
            'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
            'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id',
            'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id', 'dyah.retno@balitower.co.id',
        ] as $recipient) {
            Mail::to($recipient)->send(new NotifEmail($cleaning));
        }

        // Insert data log permit ke table CleaningHistory
        if ($cleaning->exists) {
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $cleaning->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => '1',
                'pdf' => false
            ]);
        }
        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function approve_cleaning(Request $request) // Flow Approval Permit Cleaning
    {
        // Get permit terbaru by ID Permit
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        if ($lasthistoryC->pdf == true) {
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
            } elseif ($lasthistoryC->status == 'final') {
                $cleaning = Cleaning::find($request->cleaning_id)->first();
            }


            $cleaning = Cleaning::find($request->cleaning_id);
            // Pergantian role tiap permit & send email notif
            $role_to = '';
            if (($lasthistoryC->role_to == 'review')) {
                foreach ([
                    'aurellius.putra@balitower.co.id', 'taufik.ismail@balitower.co.id', 'eri.iskandar@balitower.co.id', 'hilman.fariqi@balitower.co.id',
                    'ilham.pangestu@balitower.co.id', 'irwan.trisna@balitower.co.id', 'yoga.agus@balitower.co.id', 'yufdi.syafnizal@balitower.co.id', 'khaidir.alamsyah@balitower.co.id', 'hendrik.andy@balitower.co.id', 'bayu.prakoso@balitower.co.id',
                ] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail($cleaning));
                }
                $role_to = 'check';
            } elseif (($lasthistoryC->role_to == 'check')) {
                foreach (['security.bacep@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail($cleaning));
                }
                $role_to = 'security';
            } elseif (($lasthistoryC->role_to == 'security')) {
                foreach (['bayu.prakoso@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifEmail($cleaning));
                }
                $role_to = 'head';
            } elseif ($lasthistoryC->role_to == 'head') {
                foreach (['dc@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifFull($cleaning));
                }
                $role_to = 'all';

                $cleaning = Cleaning::where('cleaning_id', $request->cleaning_id)->first();

                // Simpan permit yang sudah full approved ke table CleaningFull
                $cleaningFull = CleaningFull::create([
                    'cleaning_id' => $cleaning->cleaning_id,
                    'cleaning_name' => $cleaning->cleaning_name,
                    'cleaning_name2' => $cleaning->cleaning_name2,
                    'cleaning_work' => $cleaning->cleaning_work,
                    'validity_from' => $cleaning->validity_from,
                    'cleaning_date' => $cleaning->created_at,
                    'link' => ("https://dcops.balifiber.id/cleaning_pdf/$cleaning->cleaning_id"),
                    // 'link' => ("http://172.16.45.195:8000/cleaning_pdf/$cleaning->cleaning_id"),
                ]);
            }

            // Simpan tiap perubahan permit ke table CLeaningHistory
            $cleaningHistory = CleaningHistory::create([
                'cleaning_id' => $request->cleaning_id,
                'created_by' => Auth::user()->id,
                'role_to' => $role_to,
                'status' => $status,
                'aktif' => true,
                'pdf' => false,
            ]);
        } else {
            abort(403);
        }

        return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
    }

    public function reject_form_cleaning(Request $request) // Reject Permit Cleaning
    {
        // Get permit terbaru by ID Permit
        $lasthistoryC = CleaningHistory::where('cleaning_id', '=', $request->cleaning_id)->latest()->first();
        if (Gate::denies('isSecurity')) {
            if ($lasthistoryC->pdf == true) {
                $lasthistoryC->update(['aktif' => false]);

                // Simpan tiap perubahan permit ke table CleaningHistory
                $cleaningHistory = CleaningHistory::create([
                    'cleaning_id' => $request->cleaning_id,
                    'created_by' => Auth::user()->id,
                    'role_to' => 0,
                    'status' => 'rejected',
                    'aktif' => true,
                    'pdf' => false,
                ]);

                // Get permit yang di reject & kirim notif email
                $cleaning = Cleaning::find($request->cleaning_id);
                foreach (['badai.sino@balitower.co.id'] as $recipient) {
                    Mail::to($recipient)->send(new NotifReject($cleaning));
                }
                return $cleaningHistory->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
            } else {
                abort(403);
            }
        }
    }

    public function checkin_update_cleaning(Request $request, $id) // Proses checkin
    {
        $data = ($request->all());
        // return var_dump($data);
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
        $validated = $request->validate([
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
            'cleaning_time_start' => ['required'],
            'cleaning_time_end' => ['required'],
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
        $imageName = Str::random(10) . '.' . $extension;

        // image2
        $extension2 = explode('/', explode(':', substr($getImage2, 0, strpos($getImage2, ';')))[1])[1];   // .jpg .png .pdf
        $replace2 = substr($getImage2, 0, strpos($getImage2, ',') + 1);
        $image2 = str_replace($replace2, '', $getImage2);
        $image2 = str_replace(' ', '+', $image2);
        $imageName2 = Str::random(10) . '.' . $extension2;

        // simpan gambar
        $gambar1 = Storage::disk('public')->put($imageName, base64_decode($image));
        $gambar2 = Storage::disk('public')->put($imageName2, base64_decode($image2));

        if ($gambar1 && $gambar2) {
            $getFull->update([
                'cleaning_name' => $data['cleaning_name'],
                'cleaning_name2' => $data['cleaning_name2'],
                'photo_checkin_personil' => $imageName,
                'photo_checkin_personil2' => $imageName2,
                'checkin_personil' => $data['checkin_personil'],
                'checkin_personil2' => $data['checkin_personil2'],
            ]);

            $getCleaning->update([
                'cleaning_time_start' => $data['cleaning_time_start'],
                'cleaning_time_start2' => $data['cleaning_time_start2'],
                'cleaning_time_start3' => $data['cleaning_time_start3'],
                'cleaning_time_start4' => $data['cleaning_time_start4'],
                'cleaning_time_start5' => $data['cleaning_time_start5'],
                'cleaning_time_start6' => $data['cleaning_time_start6'],
                'cleaning_time_end' => $data['cleaning_time_end'],
                'cleaning_time_end2' => $data['cleaning_time_end2'],
                'cleaning_time_end3' => $data['cleaning_time_end3'],
                'cleaning_time_end4' => $data['cleaning_time_end4'],
                'cleaning_time_end5' => $data['cleaning_time_end5'],
                'cleaning_time_end6' => $data['cleaning_time_end6'],
                'cleaning_name' => $data['cleaning_name'],
                'cleaning_name2' => $data['cleaning_name2'],
                'cleaning_number' => $data['cleaning_number'],
                'cleaning_number2' => $data['cleaning_number2'],
                'cleaning_nik' => $data['cleaning_nik'],
                'cleaning_nik_2' => $data['cleaning_nik_2'],
            ]);

            return redirect('logall')->with('status', 'Checkin Berhasil!');
        } else {
            return back()->with('status', 'Checkin Gagal!');
        }
    }

    public function checkout_update_cleaning(Request $request, $id) // Proses checkout
    {
        $data = $request->all();

        $validated = $request->validate([
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
        $imageName = Str::random(10) . '.' . $extension;

        //convert image2
        $extension2 = explode('/', explode(':', substr($getImage2, 0, strpos($getImage2, ';')))[1])[1];   // .jpg .png .pdf
        $replace2 = substr($getImage2, 0, strpos($getImage2, ',') + 1);
        $image2 = str_replace($replace2, '', $getImage2);
        $image2 = str_replace(' ', '+', $image2);
        $imageName2 = Str::random(10) . '.' . $extension2;

        // simpan gambar
        $gambar1 = Storage::disk('public')->put($imageName, base64_decode($image));
        $gambar2 = Storage::disk('public')->put($imageName2, base64_decode($image2));

        $getFullCheckout = CleaningFull::where('cleaning_id', $id)->first();

        if (($gambar1) && ($gambar2)) {
            $getFullCheckout->update([
                'checkout_personil' => $data['checkout_personil'],
                'checkout_personil2' => $data['checkout_personil2'],
                'photo_checkout_personil' => $imageName,
                'photo_checkout_personil2' => $imageName2,
                'status' => 'Full Approved',
            ]);

            return redirect('logall')->with('status', 'Checkout Berhasil!');
        } else {
            return back()->with('status', 'Checkout Gagal!');
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
        $cleaning = Cleaning::find($id);
        $lasthistoryC = CleaningHistory::where('cleaning_id', $id)->where('aktif', 1)->first();
        $lasthistoryC->update(['pdf' => true]);

        $cleaningHistory = DB::table('cleaning_histories')
            ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
            ->join('users', 'users.id', '=', 'cleaning_histories.created_by')
            ->where('cleaning_histories.cleaning_id', '=', $id)
            ->where('cleaning_histories.status', '!=', 'visitor')
            ->select('cleaning_histories.*', 'users.name', 'created_by')
            ->get();
        $pdf = PDF::loadview('cleaning_pdf', compact('cleaning', 'cleaningHistory', 'lasthistoryC'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
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

        // dd($getLog);
        $pdf = PDF::loadview('cleaning.fullpdf', compact('getCleaning', 'getLastLog', 'getFull', 'getLog'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }

    public function cetak_all_full_cleaning()
    {
        $getCleaning = CleaningFull::where('note', null)->get();
        $pdf = PDF::loadview('cleaning.export_full_pdf', compact('getCleaning'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->stream();
        // dd($getCleaning);
    }



    // Datatable Yajra
    public function data_full_approve_cleaning() //versi approval
    {
        $getFull = DB::table('cleaning_fulls')
            ->select(['cleaning_id', 'validity_from', 'cleaning_name', 'checkin_personil', 'checkout_personil', 'cleaning_work', 'link'])
            ->where('note', null)
            ->orderBy('cleaning_id', 'desc');
        return Datatables::of($getFull)
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';
            })
            ->addColumn('action', 'cleaning.actionLink')
            ->make(true);
    }

    public function data_log_full() //versi visitor
    {
        $full = DB::table('cleaning_fulls')
            ->select(['cleaning_id', 'validity_from', 'cleaning_name', 'cleaning_work', 'checkin_personil', 'checkout_personil'])
            ->where('note', null)
            ->orderBy('cleaning_id', 'desc');
        return Datatables::of($full)
            ->editColumn('validity_from', function ($full) {
                return $full->validity_from ? with(new Carbon($full->validity_from))->format('d/m/Y') : '';
            })
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
            ->editColumn('updated_at', function ($cleaning_log) {
                return $cleaning_log->updated_at ? with(new Carbon($cleaning_log->updated_at))->format('d/m/Y') : '';
            })
            ->editColumn('validity_from', function ($cleaning_log) {
                return $cleaning_log->validity_from ? with(new Carbon($cleaning_log->validity_from))->format('d/m/Y') : '';
            })
            ->make(true);
    }



    //Export Excel
    public function export_excel() // export log to excel
    {
        return Excel::download(new LogCleaningExport, 'log.xlsx');
    }
}
