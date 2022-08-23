<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Survey, SurveyFull, SurveyHistory, SurveyVisitor};
use Illuminate\Support\Facades\{DB, Auth, Gate, Session, Mail};
use Yajra\Datatables\Datatables;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class SurveyController extends Controller
{
    public function form() // Menampilkan form troubleshoot
    {
        return view('survey.form');
    }

    public function show_troubleshoot_reject()
    {
        return view('sales.list_reject');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'visit' => ['required', 'date', 'after:yesterday'],
            'leave' => ['required', 'date', 'after:yesterday', 'after_or_equal:visit'],
            'name' => ['required', 'alpha', 'max:255'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'number' => ['required', 'string', 'max:255'],
            'company' => [ 'required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {
            $input = $request->all();
            $insertSurvey = Survey::create([
                'visit' => $request->visit,
                'leave' => $request->leave,
            ]);

            $arrayDetail = [];
            foreach($input['name'] as $k => $v){
                $insertArray = [];
                if(isset($input['name'][$k])){

                    $insertArray = [
                        'survey_id' => $insertSurvey->id,
                        'name' => $input['name'][$k],
                        'phone' => $input['phone'][$k],
                        'numberId' => $input['numberId'][$k],
                        'company' => $input['company'][$k],
                        'department' => $input['department'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayDetail[] = $insertArray;
                }
            }
            $insertSurvey = SurveyVisitor::insert($arrayDetail);

            $insertLog = SurveyHistory::insert([
                'survey_id' => $insertSurvey->id,
                'created_by' => Auth::user()->id,
                'role_to' => 'review',
                'status' => 'requested',
                'aktif' => true,
                'pdf' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
            return redirect('logall')->with('success', 'Form Has Been Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

