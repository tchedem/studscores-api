<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('matricule', 80)->unique()->nullable();
            $table->string('last_name', 100);
            $table->string('first_name', 100);
            $table->enum('gender', array('M', 'F', 'Autres'))->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->boolean('valid')->default(true);
            $table->text('description')->nullable();
            $table->enum('role', array('respo', 'student'))->default('student');
            // $table->unsignedBigInteger('institute_or_facultie_id')->nullable();
            // $table->foreign('institute_or_facultie_id')
            //         ->references('id')
            //         ->on('institute_or_faculties')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            // $table->unsignedBigInteger('promotion_id')->nullable();
            // $table->foreign('promotion_id')
            //         ->references('id')
            //         ->on('promotions')
            //         ->onDelete('cascade')
            //         ->onUpdate('cascade');
            // $table->unsignedBigInteger('level_id')->nullable();
            // $table->foreign('level_id')
            //         ->references('id')
            //         ->on('levels')
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
        Schema::dropIfExists('students');
    }
}
