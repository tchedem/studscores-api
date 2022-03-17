<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->enum('gender', array('M', 'F', 'Autres'))->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number', 20)->unique()->nullable();
            $table->boolean('valid')->default(true);
            $table->text('description')->nullable();
            $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('teachers');
    }
}
