<?php

namespace App\Http\Controllers;

use App\Models\{CleaningFull, MasterOb, OtherHistory, OtherPersonil, Personil, PilihanWork, Rutin, Survey};
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
        // dd($arrole);
        // return view('home');
        // if($arrole){
        return view('homepage');
        // } else{
        //     abort(403);
        // }
    }

    public function dashboard() // Dashboard manajemen barang
    {
        if ((Gate::allows('isAdmin')) || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
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
            $val = [];
            if ($type_approve == 'all') {
                return view('all_approval');
            } elseif ($type_approve == 'survey') {
                $survey = DB::table('survey_histories')
                    ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_id')
                    ->whereIn('survey_histories.role_to', $role_1)
                    ->where('survey_histories.aktif', '=', 1)
                    ->select('surveys.*', 'survey_histories.pdf')
                    ->get();
                return view('sales.approval', compact('survey'));
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
                    // ->join('other_personils', 'others.id', '=', 'other_personils.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->where('other_histories.aktif', '=', 1)
                    ->select('others.*', 'other_histories.*')
                    ->orderBy('other_id', 'desc')
                    ->get();
                return view('other.maintenance_approval', compact('getMaintenance'));
            } elseif($type_approve == 'troubleshoot') {
                $getTroubleshoot = DB::table('troubleshoot_bms')
                    ->join('troubleshoot_bm_histories', 'troubleshoot_bms.id', '=', 'troubleshoot_bm_id')
                    ->select('troubleshoot_bm_histories.*', 'troubleshoot_bms')
                    ->whereIn('troubleshoot_bm_histories.role_to', $role_1)
                    ->where('troubleshoot_bm_histories', '=', true)
                    ->get();
                    dd($getTroubleshoot);
                return view('other.troubleshoot_approval', compact('getTroubleshoot'));
            } else{
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function full($type_full) // Routingan untuk menampilkan permit yang sudah full approve versi approval
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            if ($type_full == 'all') {
                return view('all_full_approval');
            } elseif ($type_full == 'survey') {
                return view('sales.full_approval');
            } elseif ($type_full == 'cleaning') {
                return view('cleaning.full_approval');
            } elseif ($type_full == 'maintenance') {
                return view('other.maintenance_full_approval');
            } else {
                abort(403);
            }
        }
    }

    public function new_permit() // KAGA KEPAKE
    {
        $role = Session::get('arrole');
        $email = Auth::user()->email;
        // dd($email);
        if ($email == 'it@mail.com') {
            return view('it.form');
        } elseif ($email == 'ipmedia@mail.com') {
            return view('it.form');
        } elseif ($email == 'ipcore@mail.com') {
            return "ini role ipcore";
        } elseif (($email == 'data.center7@balitower.co.id') || ($email == 'badai.sino@balitower.co.id')) {
            return view('cleaning.full_visitor');
        } elseif ($email == 'pac@mail.com') {
            return "ini bm";
        } elseif ($email == 'sales@mail.com') {
            return view('sales.form');
        } else {
            abort(403);
        }
    }

    public function log_all() // Routingan untuk menampilkan permit yang sudah full approve versi visitor
    {
        $email = Auth::user()->email;
        // dd($email);

        if ($email == 'it@mail.com') {
            return view('it.full_visitor');
        } elseif ($email == 'ipcore@mail.com') {
            return view('ipcore.log');
        } elseif (($email == 'badai.sino@balitower.co.id') || ($email == 'data.center7@balitower.co.id')) {
            return view('cleaning.full_visitor');
        } elseif ($email == 'sales@mail.com') {
            return view('sales.full_visitor');
        } else {
            abort(403);
        }
    }
}
