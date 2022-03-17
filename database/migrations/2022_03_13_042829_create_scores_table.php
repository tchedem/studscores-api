<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->string('student_matricule', 10)->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('matter_id')->nullable();
            $table->foreign('matter_id')
                    ->references('id')
                    ->on('matters')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->foreign('teacher_id')
                    ->references('id')
                    ->on('teachers')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            // $table->unsignedBigInteger('level_id')->nullable();
            // $table->foreign('level_id')
            //         ->references('id')
            //         ->on('levels')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            // $table->unsignedBigInteger('institute_or_facultie_id')->nullable();
            // $table->foreign('institute_or_facultie_id')
            //         ->references('id')
            //         ->on('institute_or_faculties')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->year('year')->nullable();
            $table->string('comment', 250)->nullable();
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
        Schema::dropIfExists('scores');
    }
}
