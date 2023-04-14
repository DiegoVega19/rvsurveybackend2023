<?php

namespace App\Http\Controllers;

use App\Models\InputType;
use Illuminate\Http\Request;

class InputTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs = InputType::all();
        return response()->json($inputs,500);
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
     * @param  \App\Models\InputType  $inputType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input = InputType::find($id);
        if (is_null($input)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($input,500);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InputType  $inputType
     * @return \Illuminate\Http\Response
     */
    public function edit(InputType $inputType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InputType  $inputType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InputType $inputType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InputType  $inputType
     * @return \Illuminate\Http\Response
     */
    public function destroy(InputType $inputType)
    {
        //
    }
}
