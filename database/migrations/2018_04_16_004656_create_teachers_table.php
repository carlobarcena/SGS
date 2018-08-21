<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('teacher_id');
            $table->string('teacher_idcode')->default('PENDING');
            $table->string('firstname')->default('Firstname');
            $table->string('lastname')->default('Lastname');
            $table->string('teacher_username')->unique();
            $table->string('email')->default('email@email.com');
            $table->timestamps();

            $table->foreign('teacher_username')
                ->references('username')->on('users')
                ->onDelete('cascade');
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
