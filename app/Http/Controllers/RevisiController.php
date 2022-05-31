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

    public function show_ob()
    {
        $ob = MasterOb::all();
        // dd($ob);
        return view('revisi.ob', compact('ob'));
    }

    public function show_visitor()
    {
        $visitor = Visitor::all();
        return view('admin.showVisitor', compact('visitor'));
    }

    public function yajra_visitor()
    {
        $visitor = DB::table('visitors')
            ->orderBy('id', 'asc');
        return Datatables::of($visitor)
            ->addColumn('action', 'admin.actionEdit')
            ->make(true);
    }

    public function edit_visitor($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('admin.editVisitor', compact('visitor'));
    }

    public function edit_ob($id)
    {
        $ob = MasterOb::findOrFail($id);
        return view('revisi.master', compact('ob'));
    }

    public function update_ob(Request $request, $id)
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

    public function destroy_ob($id)
    {
        // dd($id);
        MasterOb::findOrFail($id)->delete();
        Alert::success('Success', 'Personil has been deleted');
        return redirect('ob');
    }

    public function store_ob(Request $request)
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
