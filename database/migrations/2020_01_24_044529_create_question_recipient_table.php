<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionRecipientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_recipient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question_id');
            $table->string('survey_id')->nullable();
            $table->string('user_id');
            $table->string('answer')->nullable();
            $table->integer('is_answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_recipient');
    }
}
