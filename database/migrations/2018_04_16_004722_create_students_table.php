<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('student_id');
            $table->string('student_idcode')->default('PENDING');
            $table->string('firstname')->default('Firstname');
            $table->string('lastname')->default('LastName');
            $table->string('student_username')->unique();
            $table->string('email')->default('email@email.com');
            $table->integer('group_id')->unsigned()->nullable()->default(1); 
            $table->timestamps();

            $table->foreign('student_username')
                ->references('username')->on('users')
                ->onDelete('cascade');
            $table->foreign('group_id')
                ->references('id')->on('groups')
                ->onDelete('set null');
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
