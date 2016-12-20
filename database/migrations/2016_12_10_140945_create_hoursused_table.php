<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoursusedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoursused', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lessonhours_id')->unsigned();
            $table->datetime('date_time');
            $table->float('numberofhours');
            $table->text('comments');
            $table->timestamps();
        });
        
        Schema::table('hoursused', function (Blueprint $table) {
            $table->foreign('lessonhours_id')->references('id')->on('lessonhours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hoursused');
    }
}
