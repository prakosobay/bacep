<?php

namespace App\Http\Controllers;

use App\Models\MasterOb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session, Storage};
use Illuminate\Support\Str;
use App\Models\{Visitor};
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class RevisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Show Pages
    public function show_ob() // Menampilkan seluruh data OB
    {
        $ob = MasterOb::all();
        return view('revisi.ob', compact('ob'));
    }

    public function show_visitor() // Menampilkan seluruh data visitor
    {
        $visitor = Visitor::all();
        return view('admin.showVisitor', compact('visitor'));
    }

    public function revisi_visitor_create()
    {
        return view('admin.newVisitor');
    }

    // Edit Pages
    public function edit_visitor($id) // Menampilkan data visitor terpilih
    {
        $visitor = Visitor::findOrFail($id);
        return view('admin.editVisitor', compact('visitor'));
    }

    public function edit_ob($id) // Menampilkan data ob terpilih
    {
        $ob = MasterOb::findOrFail($id);
        return view('revisi.master', compact('ob'));
    }

    // Yajra Table
    public function yajra_visitor() // Mengambil data visitor dengan datatable yajra
    {
        $visitor = DB::table('visitors')
            ->where('deleted_at', NULL)
            ->orderBy('id', 'asc');
        return Datatables::of($visitor)
            ->addColumn('action', 'admin.actionEdit')
            ->make(true);
    }


    // Submit data
    public function update_ob(Request $request, $id) // Update data personil OB terpilih
    {
        // Validasi data dari request
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric'],
            'pt' => ['required', 'string'],
            'responsible' => ['required', 'string'],
            'department' => ['required', 'string'],
        ]);

        $update = MasterOb::findOrFail($id);
        $update->update([
            'nama' => $request->nama,
            'phone_number' => $request->phone_number,
            'pt' => $request->pt,
            'responsible' => $request->responsible,
            'department' => $request->department,
        ]);

        Alert::success('Success', 'Personil has been edited');
        return redirect('ob');
    }

    public function update_visitor(Request $request, $id)
    {
        //dd($request->all());
        $validated = $request->validate([
            'nama' => ['required'],
            'company' => ['required'],
            'department' => ['required'],
            'phone' => ['required'],
            'nik' => ['required'],
            'respon' => ['required'],
        ]);

        if($validated){
            $update = Visitor::findOrFail($id);
            $update->update([
                'visit_nama' => $request->nama,
                'visit_company' => $request->company,
                'visit_department' => $request->department,
                'visit_respon' => $request->respon,
                'visit_phone' => $request->phone,
                'visit_nik' => $request->nik,
            ]);

            return redirect()->route('show_visitor')->with('success', 'berhasil update yeayyy');
        }
    }

    //delete
    public function destroy_ob($id) // Menghapus data personil OB terpilih
    {
        MasterOb::findOrFail($id)->delete();
        Alert::success('Success', 'Personil has been deleted');
        return redirect('ob');
    }

    public function destroy_visitor($id) // Menghapus data visitor terpilih
    {
        //dd($id);
        Visitor::findOrFail($id)->delete();
        Alert::success('Success', 'Personil has been deleted');
        return redirect('revisi/visitor/show');
    }


    // Store
    public function store_ob(Request $request) // Menambahkan personil OB terbaru
    {
        // dd($request->all());
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'numeric'],
            'phone_number' => ['required'],
            'pt' => ['required', 'string'],
            'responsible' => ['required', 'string'],
            'department' => ['required', 'string'],
        ]);

        if($validated){
            $create = MasterOb::create([
                'nama' => $request->nama,
                'id_number' => $request->id_number,
                'phone_number' => $request->phone_number,
                'pt' => $request->pt,
                'responsible' => $request->responsible,
                'department' => $request->department,
            ]);

            if($create){
                return back()->with('success', 'berhasil yeayyy');
            }
        } else {
            return back()->with('gagal', 'gagal');
        }

    }

    public function store_visitor(Request $request) // Menambahkan visitor terbaru
    {
        $validated = $request->validate([
            'nama' => ['required'],
            'company' => ['required'],
            'dept' => ['required'],
            'phone' => ['required'],
            'nik' => ['required'],
            'respon' => ['required'],
        ]);

        if($validated){
            $create = Visitor::insert([
                'visit_nama' => $request->nama,
                'visit_company' => $request->company,
                'visit_department' => $request->dept,
                'visit_respon' => $request->respon,
                'visit_phone' => $request->phone,
                'visit_nik' => $request->nik,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if($create){
                return redirect()->route('show_visitor')->with('success', 'berhasil yeayyy');
            }
        } else {
            return back()->with('gagal', 'gagal');
        }
    }
}
