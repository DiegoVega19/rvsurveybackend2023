<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyInfoHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_info_headers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interviewerId')->unsigned();
            $table->bigInteger('surveySetId')->unsigned();
            $table->date('dateCreated');
            $table->string('interviewedName');
            $table->string('interviewedPhone');
            $table->string('neighborhood');
            $table->string('municipality');
            $table->timestamps();
            $table->foreign('interviewerId')->references('id')->on('interviewers');
            $table->foreign('surveySetId')->references('id')->on('survey_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_info_headers');
    }
}
