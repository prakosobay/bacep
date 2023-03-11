<?php

namespace App\Http\Controllers;

use App\Models\{AccessRequestInternal, ChangeRequestInternal, Cleaning, Internal, InternalHistory, Other, OtherHistory, PenomoranCleaning, User};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public $role;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    // public function index() // Get role tiap user & masuk ke homepage
    // {

    //     $role_2 = Auth::user()->roles;
    //     $arrole = [];
    //     foreach ($role_2 as $rolee) {
    //         $arrole[] = $rolee->name;
    //     }
    //     Session::put('arrole', $arrole);
    //     return redirect()->route('homepage');
    // }


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
                return view('sales.history');
            } elseif ($type_view == 'cleaning') {
                return view('cleaning.history');
            } elseif ($type_view == 'maintenance') {
                return view('other.maintenance_history');
            } elseif($type_view == 'troubleshoot') {
                return view('other.troubleshoot_history');
            } elseif($type_view == 'internal'){
                return view('internal.history');
            } elseif($type_view == 'eksternal') {
                return view('eksternal.history');
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
                    // 16 15 12
                return view('cleaning.approval', compact('cleaning'));
            } elseif ($type_approve == 'maintenance') {
                // $getMaintenance = DB::table('other_histories')
                //     ->join('others', 'others.id', '=', 'other_histories.other_id')
                //     ->whereIn('other_histories.role_to', $role_1)
                //     ->where('other_histories.aktif', '=', 1)
                //     ->select('others.work', 'others.visit', 'others.created_at as requested_at', 'other_histories.*')
                //     ->orderBy('other_id', 'desc')
                //     ->get();

                $getMaintenance = Other::whereHas('histories', function ($query) use ($role_1) {
                        $query->where('aktif', true)->whereIn('role_to', $role_1);
                    })->with([
                        'histories' => function ($query) {
                        $query->select('other_id', 'aktif', 'created_by', 'status', 'role_to', 'updated_at')->get();
                        }
                    ])->select('id', 'visit', 'created_at as requested_at', 'work')->get();
                    // return $getMaintenance;
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
                $getInternal = DB::table('internals')
                    ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
                    ->join('users', 'internals.requestor_id', '=', 'users.id')
                    ->leftJoin('entry_racks', 'internals.id', '=', 'entry_racks.internal_id')
                    ->join('m_racks', 'entry_racks.m_rack_id', '=', 'm_racks.id')
                    ->select('users.name as req_name', 'internals.*', 'internal_histories.aktif', 'internal_histories.role_to', 'm_racks.number as rack_number')
                    ->whereIn('internal_histories.role_to', $role_1)
                    ->where('internal_histories.aktif', '=', 1)
                    ->where('internals.isColo', true)
                    ->groupBy('internals.id' )
                    ->get();
                return view('internal.approval', compact('getInternal'));
            }  elseif($type_approve == 'survey') {
                $getSurvey = DB::table('internals')
                    ->join('internal_histories', 'internals.id', '=', 'internal_histories.internal_id')
                    ->leftJoin('users', 'internals.requestor_id', '=', 'users.id')
                    ->select('internals.*', 'internal_histories.aktif', 'internal_histories.role_to', 'users.name as req_name')
                    ->where('internal_histories.aktif', '=', 1)
                    ->whereIn('internal_histories.role_to', $role_1)
                    ->where('internals.isSurvey', true)
                    ->groupBy('internals.id')
                    ->get();
                return view('sales.approval', compact('getSurvey'));
            } elseif($type_approve == 'eksternal') {
                $getEksternal = DB::table('eksternals')
                    ->leftJoin('eksternal_histories', 'eksternals.id', '=', 'eksternal_histories.eksternal_id')
                    ->leftJoin('users', 'eksternals.requestor_id', '=', 'users.id')
                    ->leftJoin('entry_racks', 'eksternals.id', '=', 'entry_racks.eksternal_id')
                    ->join('m_racks', 'entry_racks.m_rack_id', '=', 'm_racks.id')
                    ->select('eksternals.*', 'eksternal_histories.aktif', 'eksternal_histories.role_to', 'users.name as req_name', 'm_racks.number as rack_number')
                    ->where('eksternal_histories.aktif', '=', 1)
                    ->whereIn('eksternal_histories.role_to', $role_1)
                    ->groupBy('eksternals.id')
                    ->get();
                return view('eksternal.approval', compact('getEksternal'));
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function full($type_full) // Routingan untuk menampilkan permit yang sudah full approve versi approval
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isHead') || (Gate::allows('isAdmin')))) {
            if ($type_full == 'all') {
                return view('all_full_approval');
            } elseif ($type_full == 'sales') {
                return view('sales.fullApproval');
            } elseif ($type_full == 'cleaning') {
                return view('cleaning.full_approval');
            } elseif ($type_full == 'maintenance') {
                return view('other.maintenance_full_approval');
            } elseif($type_full == 'troubleshoot') {
                return view('other.troubleshoot_full_approval');
            } elseif($type_full == 'internal') {
                $users = User::where('slug', 'visitor')->get();
                return view('internal.fullApproval', compact('users'));
            } elseif($type_full == 'eksternal') {
                return view('eksternal.fullApproval');
            } else {
                abort(403);
            }
        }
    }

    public function penomoran($type_nomor)
    {
        if($type_nomor == 'bm') {

            $getNomor = PenomoranCleaning::all();
            return view('cleaning.penomoran', compact('getNomor'));

        } elseif($type_nomor == 'internal') {

            $ar = AccessRequestInternal::all();
            $cr = ChangeRequestInternal::all();
            return view('internal.penomoran', compact('ar', 'cr'));
        }
    }

    public function log_all() // Routingan untuk menampilkan permit yang sudah full approve versi BM
    {
        $slug = Auth::user()->slug;
        switch($slug){

            case 'bm' :
                return view('cleaning.full_visitor');
                break;

            default:
            abort(403);
        }
    }
}
