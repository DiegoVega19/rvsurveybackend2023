<?php

namespace App\Http\Controllers;

use App\Models\Interviewer;
use Illuminate\Http\Request;

class InterviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewers = Interviewer::all();
        return response()->json(
            $interviewers  
            ,201);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interviewer = Interviewer::find($id);
        if (is_null($interviewer)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json(
        $interviewer   
        ,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function edit(Interviewer $interviewer)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interviewer $interviewer)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interviewer $interviewer)
    {
        //
    }

}
