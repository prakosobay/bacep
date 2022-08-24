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

    public function create(Request $request)
    {
        $request->validate([
            'visit' => ['required', 'after:yesterday'],
            'leave' => ['required', 'after_or_equal:visit'],
            'name[]' => ['string', 'max:255'],
            'number[]' => ['string', 'max:255'],
            'phone[]' => ['max:255'],
            'company[]' => ['string', 'max:255'],
            'department[]' => ['string', 'max:255'],
        ]);

        $input = $request->all();
        dd($input);

        DB::beginTransaction();

        try {

            $insertSurvey = Survey::create([
                'user_id' => auth()->user()->id,
                'visit' => $input['visit'],
                'leave' => $input['leave'],
            ]);

            $arrayVisitor = [];
            foreach($input['name'] as $k => $v){
                $insertArray = [];
                if(isset($input['name'][$k])){

                    $insertArray = [
                        'survey_id' => $insertSurvey->id,
                        'name' => $input['name'][$k],
                        'phone' => $input['phone'][$k],
                        'numberId' => $input['number'][$k],
                        'department' => $input['department'][$k],
                        'company' => $input['company'][$k],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $arrayVisitor[] = $insertArray;
                }
            }
            $insertVisitor = SurveyVisitor::insert($arrayVisitor);

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

    public function pdf($id)
    {
        $getLastHistory = SurveyHistory::where('survey_id', $id)->where('aktif', 1)->first();
        $getLastHistory->update(['pdf' => true]);
        $getSurvey = Survey::findOrFail($id);

        $pdf = PDF::loadview('survey.pdf', compact('getLastHistory', 'getSurvey'))->setPaper('a4', 'portrait')->setWarnings(false);
        return $pdf->stream();
    }
}

