<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterSlug;
use Illuminate\Support\Facades\{DB, Email};
use Yajra\DataTables\Datatables;

use function PHPUnit\Framework\throwException;

class MasterSlugController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            MasterSlug::firstOrCreate([
                'name' => $request->name,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('slug')->with('success', 'Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $getSlug = MasterSlug::findOrFail($id);
            $getSlug->update([
                'name' => $request->name,
                'updated_by' => auth()->user()->id,
            ]);

            DB::commit();

            return redirect()->route('slug')->with('success', 'Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $getSlug = MasterSlug::findOrFail($id);
            $getSlug->delete();

            DB::commit();

            return redirect()->route('slug')->with('success', 'Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function table()
    {
        return view('slug.table');
    }

    public function yajra()
    {
        $slug = DB::table('m_slugs')
            ->join('users', 'users.id', '=', 'm_slugs.created_by')
            // ->join('users', 'users.id', '=', 'm_slugs.updated_by')
            ->select('m_slugs.*', 'users.name as createdby')
            ->where('m_slugs.deleted_at', null);
        return Datatables::of($slug)
            ->addColumn('action', 'slug.actionEdit')
            ->make(true);
    }
}
