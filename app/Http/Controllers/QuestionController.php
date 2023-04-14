<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
            'questionName' => 'required|string',
            'isRequired' => 'required|boolean',
        ]);

        $question = Question::create([
            'questionName' => $request->questionName,
            'isRequired' => $request->isRequired,
            'inputTypeId' => $request->inputTypeId,
            'surveyId' => $request->surveyId,
        ]);

        foreach ($request->options as $options) {
            //suposse you have orders table which has user id
            Option::create([
                "optionName" => $options['optionName'],
                "spsVariable" => $options['spsVariable'],
                "questionId" => $question->id
            ]);
        }
        return response()->json([
            'message' => 'Successfully created Question!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $survey = Question::with(['options'])->where('surveyId', '=', 1)->get();
        return response()->json($survey, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}