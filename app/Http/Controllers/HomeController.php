<?php

namespace App\Http\Controllers;

use App\Models\{Internal, InternalHistory, SurveyHistory};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session};

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

    public function index() // Get role tiap user & masuk ke homepage
    {

        $role_2 = Auth::user()->roles;
        // dd($role_2);
        $arrole = [];
        foreach ($role_2 as $rolee) {
            $arrole[] = $rolee->name;
        }
        Session::put('arrole', $arrole);
        // dd($arrole[0]);
        // return view('home');
        // if($arrole){
        return view('homepage');
        // } else{
        //     abort(403);
        // }
    }

    public function dashboard() // Dashboard manajemen barang
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            return view('item.input');
        } else {
            abort(404);
        }
    }

    public function history($type_view) // Routingan log permit versi approval
    {
        if ((Gate::denies('isAdmin') && (Gate::denies('isVisitor')))) {
            if ($type_view == 'all') {
                return view('all_history');
            } elseif ($type_view == 'survey') {
                return view('survey.history');
            } elseif ($type_view == 'cleaning') {
                return view('cleaning.history');
            } elseif ($type_view == 'maintenance') {
                return view('other.maintenance_history');
            } elseif($type_view == 'troubleshoot') {
                return view('other.troubleshoot_history');
            } elseif($type_view == 'internal'){
                return view('internal.history');
            } elseif($type_view == 'colo') {
                return view('colo.history');
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function approval($type_approve) // Routingan untuk menampilkan permit yang akan di approve tiap rolenya
    {
        if ((Gate::denies('isAdmin') && (Gate::denies('isVisitor')))) {
            $role_1 = Session::get('arrole');
            // dd($role_1);
            $val = [];
            if ($type_approve == 'all') {
                return view('all_approval');
            } elseif ($type_approve == 'cleaning') {
                $cleaning = DB::table('cleaning_histories')
                    ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                    ->whereIn('cleaning_histories.role_to', $role_1)
                    ->where('cleaning_histories.aktif', '=', 1)
                    ->select('cleanings.*')
                    ->orderBy('cleaning_id', 'desc')
                    ->get();
                return view('cleaning.approval', compact('cleaning'));
            } elseif ($type_approve == 'maintenance') {
                $getMaintenance = DB::table('other_histories')
                    ->join('others', 'others.id', '=', 'other_histories.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->where('other_histories.aktif', '=', 1)
                    ->select('others.*', 'other_histories.*')
                    ->orderBy('other_id', 'desc')
                    ->get();
                return view('other.maintenance_approval', compact('getMaintenance'));
            } elseif($type_approve == 'troubleshoot') {
                $getTroubleshoot = DB::table('troubleshoot_bms')
                    ->join('troubleshoot_bm_histories', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_histories.troubleshoot_bm_id')
                    ->whereIn('troubleshoot_bm_histories.role_to', $role_1)
                    ->where('troubleshoot_bm_histories.aktif', '=', true)
                    ->select('troubleshoot_bm_histories.*', 'troubleshoot_bms.*')
                    ->get();
                return view('other.troubleshoot_approval', compact('getTroubleshoot'));
            } elseif($type_approve == 'internal'){
                // $getDept = auth()->user()->department;
                $getInternal = DB::table('internals')
                        ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
                        ->join('users', 'internals.requestor_id', '=', 'users.id')
                        ->leftJoin('entry_racks', 'internals.id', '=', 'entry_racks.internal_id')
                        ->select('users.name as req_name', 'internals.*', 'internal_histories.aktif', 'internal_histories.role_to', 'users.department as dept')
                        ->whereIn('internal_histories.role_to', $role_1)
                        ->where('internal_histories.aktif', '=', 1)
                        ->groupBy('entry_racks.internal_id' )
                        ->get();
                        // dd($getInternal);
                return view('internal.approval', compact('getInternal'));
            }  else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function full($type_full) // Routingan untuk menampilkan permit yang sudah full approve versi approval
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            if ($type_full == 'all') {
                return view('all_full_approval');
            } elseif ($type_full == 'survey') {
                return view('survey.full_approval');
            } elseif ($type_full == 'cleaning') {
                return view('cleaning.full_approval');
            } elseif ($type_full == 'maintenance') {
                return view('other.maintenance_full_approval');
            } elseif($type_full == 'troubleshoot') {
                return view('other.troubleshoot_full_approval');
            } elseif($type_full == 'internal') {
                return view('internal.fullApproval');
            } elseif($type_full == 'colo') {
                return view('colo.fullApproval');
            } else {
                abort(403);
            }
        }
    }

    public function log_all() // Routingan untuk menampilkan permit yang sudah full approve versi BM
    {
        $dept = Auth::user()->department;
        switch($dept){

            case 'Building Management' :
                return view('cleaning.full_visitor');
                break;

            default:
            abort(403);
        }
    }
}
