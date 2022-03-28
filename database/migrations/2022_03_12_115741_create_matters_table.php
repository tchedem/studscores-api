<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->unsignedBigInteger('institute_or_facultie_id')->nullable();
            // $table->foreign('institute_or_facultie_id')
            //         ->references('id')
            //         ->on('institute_or_faculties')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            $table->unsignedBigInteger('academic_manager_id')->nullable();
            $table->foreign('academic_manager_id')
                    ->references('id')
                    ->on('users')
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
            // $table->unsignedBigInteger('promotion_id')->nullable();
            // $table->foreign('promotion_id')
            //         ->references('id')
            //         ->on('promotions')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
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
        Schema::dropIfExists('matters');
    }
}
