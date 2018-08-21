<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('mark_id');
            $table->string('mark_username');
            $table->integer('subject')->unsigned();
            $table->float('mark1',8,2)->unsigned()->default(0);
            $table->float('mark2',8,2)->unsigned()->default(0);
            $table->float('mark3',8,2)->unsigned()->default(0);
            $table->float('mark4',8,2)->unsigned()->default(0);   
            $table->timestamps();

            $table->foreign('mark_username')
                ->references('student_username')->on('students')
                ->onDelete('cascade');
             $table->foreign('subject')
                ->references('id')->on('subjects')
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
        Schema::dropIfExists('marks');
    }
}
