<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1'
], function () {
    Route::post('loginUser', 'App\Http\Controllers\AuthController@login');
    Route::post('registerInterviewer', 'App\Http\Controllers\AuthController@registerInterviewer');
    Route::get('interviewers/{id}','App\Http\Controllers\InterviewerController@show');
    Route::get('interviewers','App\Http\Controllers\InterviewerController@index');
    Route::get('surveys/{id}','App\Http\Controllers\SurveySetController@show');
    Route::get('surveys','App\Http\Controllers\SurveySetController@index');
    Route::post('createSurvey', 'App\Http\Controllers\SurveySetController@store');
    Route::get('inputs/{id}','App\Http\Controllers\InputTypeController@show');
    Route::get('inputs','App\Http\Controllers\InputTypeController@index');
    Route::post('createAnswer', 'App\Http\Controllers\QuestionController@store');
    Route::get('surveysWithQuestions/{id}','App\Http\Controllers\SurveySetController@showQuestionsAndAnswers');
    Route::get('reports/{id}','App\Http\Controllers\SurveySetController@reportsInfo');
    Route::post('takeSurvey', 'App\Http\Controllers\SurveyInfoHeaderController@store');
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
    });
});

