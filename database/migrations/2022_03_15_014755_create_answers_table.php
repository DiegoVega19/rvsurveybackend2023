<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('answerSelected',100);
            $table->string('variableSelected',100);
            $table->bigInteger('infoHeaderId')->unsigned();
            $table->bigInteger('optionId')->unsigned();
            $table->timestamps();
            $table->foreign('infoHeaderId')->references('id')->on('survey_info_headers');
            $table->foreign('OptionId')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
