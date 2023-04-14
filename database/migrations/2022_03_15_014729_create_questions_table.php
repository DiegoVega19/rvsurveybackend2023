<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('questionName',40);
            $table->boolean('isRequired');
            $table->bigInteger('inputTypeId')->unsigned();
            $table->bigInteger('surveyId')->unsigned();
            $table->timestamps();
            $table->foreign('inputTypeId')->references('id')->on('input_types');
            $table->foreign('surveyId')->references('id')->on('survey_sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
