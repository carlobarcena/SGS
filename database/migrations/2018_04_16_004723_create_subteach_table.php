<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubteachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subteachs', function (Blueprint $table) {
            $table->integer('subteach_id')->unsigned()->nullable();
            $table->string('subteach_username');
            $table->integer('group_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('subteach_username')
                ->references('teacher_username')->on('teachers')
                ->onDelete('cascade');
            $table->foreign('subteach_id')
                ->references('id')->on('subjects')
                ->onDelete('set null');
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
        Schema::dropIfExists('subteachs');
    }
}
