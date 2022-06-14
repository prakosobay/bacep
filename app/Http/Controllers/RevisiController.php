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
            'id_number' => ['required', 'numeric'],
            'phone_number' => ['required'],
            'pt' => ['required', 'string'],
            'responsible' => ['required', 'string'],
            'department' => ['required', 'string'],
        ]);

        $update = MasterOb::findOrFail($id);
        $update->update([
            'nama' => $request->nama,
            'id_number' => $request->id_number,
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
        $request->validate([
            'visit_nama' => ['required', 'string', 'max:255'],
            'visit_company' => ['required'],
            'visit_department' => ['required', 'string'],
            'visit_respon' => ['required', 'string'],
            'visit_phone' => ['required', 'string'],
            'visit_nik' => ['required', 'numeric'],
        ]);

        $update = Visitor::findOrFail($id);
        $update->update([
            'visit_nama' => $request->visit_nama,
            'visit_company' => $request->visit_company,
            'visit_department' => $request->visit_department,
            'visit_respon' => $request->visit_respon,
            'visit_phone' => $request->visit_phone,
        ]);

        Alert::success('Success', 'Personil has been edited');
        return redirect('revisi/visitor/show');
    }

    //delete

    public function destroy_ob($id) // Menghapus data personil OB terpilih
    {
        MasterOb::findOrFail($id)->delete();
        Alert::success('Success', 'Personil has been deleted');
        return redirect('ob');
    }

    public function store_ob(Request $request) // Menambahkan personil OB terbaru
    {
        // dd($request->all());
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'numeric'],
            'phone_number' => ['required'],
            'pt' => ['required', 'string'],
            'responsible' => ['required', 'string'],
            'department' => ['required', 'string'],
        ]);

        $create = MasterOb::create([
            'nama' => $request->nama,
            'id_number' => $request->id_number,
            'phone_number' => $request->phone_number,
            'pt' => $request->pt,
            'responsible' => $request->responsible,
            'department' => $request->department,
        ]);

        return $create->exists ? response()->json(['status' => 'SUCCESS']) : response()->json(['status' => 'FAILED']);
        // Alert::success('Success', 'Personil has been added');
        // return redirect('ob');
    }
}
