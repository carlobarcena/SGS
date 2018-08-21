<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idcode')->default('PENDING');
            $table->string('firstname')->default('Firstname');
            $table->string('lastname')->default('Lastname');
            $table->string('username')->unique();
            $table->string('email')->default('email@email.com');
            $table->timestamps();

            $table->foreign('username')
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
        Schema::dropIfExists('admins');
    }
}
