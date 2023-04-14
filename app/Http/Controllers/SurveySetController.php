<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use App\Models\SurveySet;
use Illuminate\Http\Request;

class SurveySetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $surveys = SurveySet::all();
        return response()->json(
            $surveys
            ,
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateCreated' => 'required|date'
        ]);
        SurveySet::create($request->all());
        return response()->json([
            'message' => 'Successfully created Survey!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveySet  $surveySet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = SurveySet::find($id);
        if (is_null($survey)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($survey, 200);
    }
    public function showQuestionsAndAnswers($id)
    {
        $survey = SurveySet::with('survey_info_headers', 'questions.options')->where('id', '=', $id)->first();
        return response()->json($survey, 200);
    }

    public function reportsInfo($id)
    {
        $survey = SurveySet::with('survey_info_headers.answers')->where('id', '=', $id)->first();
        // foreach($survey as $sv){

        // }
        return response()->json($survey, 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveySet  $surveySet
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveySet $surveySet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveySet  $surveySet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveySet $surveySet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveySet  $surveySet
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveySet $surveySet)
    {
        //
    }
}