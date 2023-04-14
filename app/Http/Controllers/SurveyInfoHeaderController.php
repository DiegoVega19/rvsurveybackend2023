<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\SurveyInfoHeader;
use Illuminate\Http\Request;

class SurveyInfoHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'dateCreated' => 'required|date',
            'interviewedName' => 'required|string',
            'interviewedPhone' => 'required|string',
            'neighborhood' => 'required|string',
            'municipality' => 'required|string',
        ]);
        
        $surveyInfoHeader = SurveyInfoHeader::create([
            'interviewerId' => $request->interviewerId,
            'surveySetId' => $request->surveySetId,
            'dateCreated' => $request->dateCreated,
            'interviewedName' => $request->interviewedName,
            'interviewedPhone' => $request->interviewedPhone,
            'neighborhood' => $request->neighborhood,
            'municipality' => $request->municipality,
        ]);
        foreach($request->answers as $answer)
        {
          //suposse you have orders table which has user id
           Answer::create([
             "answerSelected" => $answer['answerSelected'],
             "variableSelected" => $answer['variableSelected'],
             "infoHeaderId"        => $surveyInfoHeader->id,
             "optionId"      => $answer['optionId'],
           ]);
        }
        return response()->json([
            'message' => 'Successfully Survey Answered!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyInfoHeader  $surveyInfoHeader
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyInfoHeader $surveyInfoHeader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyInfoHeader  $surveyInfoHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyInfoHeader $surveyInfoHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyInfoHeader  $surveyInfoHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyInfoHeader $surveyInfoHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyInfoHeader  $surveyInfoHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyInfoHeader $surveyInfoHeader)
    {
        //
    }
}
