<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\{DB, Auth, Gate, Mail, Session};
use App\Imports\AssetImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\{Asset};
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        if (Gate::allows('isApproval') || (Gate::allows('isHead'))) {
            $asset = Asset::all();
            return view('asset.create');
        } else {
            abort(403);
        }
    }

    public function import_csv(Request $request)
    {
        Excel::import(new AssetImport, $request->file('file'));
    }

    public function data_asset()
    {
        return Datatables::of(Asset::query())->make(true);
    }
}
