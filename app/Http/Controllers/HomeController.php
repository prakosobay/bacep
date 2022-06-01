<?php

namespace App\Http\Controllers;

use App\Models\{CleaningFull, MasterOb, OtherHistory, Personil, PilihanWork, Rutin, Survey};
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

    public function index()
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

    public function dashboard()
    {
        if ((Gate::allows('isAdmin')) || (Gate::allows('isApproval')) || (Gate::allows('isHead'))) {
            return view('item.input');
        } else {
            abort(404);
        }
    }

    public function approval_view($type_view)
    {
        if ((Gate::denies('isAdmin') && (Gate::denies('isVisitor')))) {
            $role_1 = Session::get('arrole');
            if ($type_view == 'survey') {
                $survey = DB::table('survey_histories')
                    ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_id')
                    ->where('survey_histories.role_to', '=', $role_1)
                    ->where('survey_histories.aktif', '=', 1)
                    ->select('surveys.*')
                    ->get();
                dd($survey);
                return view('sales.approva', compact('survey'));
            } elseif ($type_view == 'cleaning') {
                $cleaning = DB::table('cleaning_histories')
                    ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                    ->whereIn('cleaning_histories.role_to', $role_1)
                    ->where('cleaning_histories.aktif', '=', 1)
                    ->select('cleanings.*')
                    ->get();
                return view('hasil_cleanings', compact('cleaning'));
            } else if ($type_view == 'other') {
                $otherHistories = DB::table('other_histories')
                    ->join('other', 'other.other_id', '=', 'other_histories.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->where('other_histories.status', '!=', 'revisi')
                    ->where('other_histories.aktif', '=', 1)
                    ->select('other.*', 'other_histories.status', 'other_histories.pdf')
                    ->get();
                return view('other.show', compact('otherHistories'));
            } else {
                return view('all_approval');
            }
        } else {
            abort(403);
        }
    }

    public function revisi_view($type_view)
    {
        if ((Gate::denies('isSecurity'))) {
            $role_1 = Session::get('arrole');
            if ($type_view == 'other') {
                $revisi = DB::table('other_histories')
                    ->join('other', 'other.other_id', '=', 'other_histories.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->where('other_histories.status', '=', 'revisi')
                    ->where('other_histories.aktif', '=', 1)
                    ->select('other.*')
                    ->get();
                // dd($revisi);
                return view('other.revisi', compact('revisi'));
            }
        }
    }

    public function log_view($type_view)
    {
        if ($type_view == 'all') {

            return view('log');
        } elseif ($type_view == 'cleaning') {
            $cleaningLog = DB::table('cleaning_histories')
                ->join('cleanings', 'cleanings.cleaning_id', '=', 'cleaning_histories.cleaning_id')
                ->select('cleaning_histories.*', 'cleanings.cleaning_work', 'cleanings.validity_from')
                ->get();
            return view('log_cleaning', ['cleaningLog' => $cleaningLog]);
        } elseif ($type_view == 'other') {
            $other_log = DB::table('other_histories')
                ->join('other', 'other.other_id', '=', 'other_histories.other_id')
                ->join('users', 'users.id', '=', 'other_histories.created_by')
                ->select('other_histories.*', 'other.other_work', 'other.val_from', 'users.name')
                ->get();
            // dd($other_log);
            return view('other.log', compact('other_log'));
        } elseif ($type_view == 'survey') {
            $survey_log = DB::table('survey_histories')
                ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_id')
                ->join('users', 'users.id', '=', 'survey_histories.created_by')
                ->select('survey_histories.*', 'surveys.visit', 'users.name')
                ->get();
            dd($survey_log);
            return view('sales.history', compact('survey_log'));
        }
    }

    public function history($type_view)
    {
        if ((Gate::denies('isAdmin') && (Gate::denies('isVisitor')))) {
            if ($type_view == 'all') {
                return view('all_history');
            } elseif ($type_view == 'survey') {
                return view('sales.history');
            } elseif ($type_view == 'cleaning') {
                return view('cleaning.history');
            } else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function approval($type_approve)
    {
        if ((Gate::denies('isAdmin') && (Gate::denies('isVisitor')))) {
            $role_1 = Session::get('arrole');
            $val = [];
            if ($type_approve == 'all') {
                return view('all_approval');
            } elseif ($type_approve == 'survey') {
                // dd($role_1);
                $survey = DB::table('survey_histories')
                    ->join('surveys', 'surveys.id', '=', 'survey_histories.survey_id')
                    ->whereIn('survey_histories.role_to', $role_1)
                    ->where('survey_histories.aktif', '=', 1)
                    ->select('surveys.*', 'survey_histories.pdf')
                    ->get();
                // $pic = Survey::select('visit_name')->get();
                $json = json_decode($survey, true);
                // dd($survey);
                return view('sales.approval', compact('survey', 'json'));
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
                    ->join('others', 'others.id', '=', 'other_personils.other_id')
                    ->where('other_histories.aktif', '=', 1)
                    // ->whereColumn('other_histories.other_id', '=', 'other_personils.other_id')
                    ->whereIn('other_histories.role_to', $role_1)
                    ->select('others.*')
                    ->get();
                dd($getMaintenance);
                return view('other.maintenance_approval', compact('getMaintenance'));
            }
            else {
                abort(403);
            }
        } else {
            abort(403);
        }
    }

    public function full($type_full)
    {
        if ((Gate::allows('isApproval')) || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
            if ($type_full == 'all') {
                return view('all_full_approval');
            } elseif ($type_full == 'survey') {
                return view('sales.full_approval');
            } elseif ($type_full == 'cleaning') {
                return view('cleaning.full_approval');
            } else {
                abort(403);
            }
        }
    }

    // public function approval_full($type_form)
    // {
    //     if ((Gate::allows('isApproval')) || (Gate::allows('isHead')) || (Gate::allows('isAdmin'))) {
    //         if ($type_form == 'all') {
    //             return view('full_approval');
    //         } elseif ($type_form == 'survey') {
    //             $surveyFull = DB::table('survey_fulls')->get();
    //             return view('full_survey', compact('surveyFull'));
    //         } elseif ($type_form == 'cleaning') {
    //             $cleaningFull = DB::table('cleaning_fulls')->get();
    //             return view('full_cleaning', compact('cleaningFull'));
    //         } elseif ($type_form == 'other') {
    //             $otherFull = DB::table('other_fulls')->get();
    //             // dd($otherFull);
    //             return view('other.full', compact('otherFull'));
    //         }
    //     } else {
    //         abort(403);
    //     }
    // }

    public function new_permit()
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

    public function log_all()
    {
        $email = Auth::user()->email;
        // dd($email);

        if ($email == 'it@mail.com') {
            return view('it.log');
        } elseif ($email == 'ipcore@mail.com') {
            return view('ipcore.log');
        } elseif (($email == 'badai.sino@balitower.co.id') || ($email == 'data.center7@balitower.co.id')) {
            return view('cleaning.full_visitor');
        } elseif ($email == 'sales@mail.com') {
            return view('sales.log');
        } else {
            abort(403);
        }
    }
}
