<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonhours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packages_id')->unsigned();
            $table->date('signup_date');
            $table->timestamps();
        });
        
        Schema::table('lessonhours', function (Blueprint $table) {
             $table->foreign('packages_id')->references('id')->on('packages');
         });
        
        
        Schema::create('lessonhour_player', function (Blueprint $table) 
        {
            $table->integer('lessonhours_id')->unsigned();
            $table->integer('players_id')->unsigned();
            $table->timestamps();
        });
        
        Schema::table('lessonhour_player', function (Blueprint $table) {
            $table->foreign('lessonhours_id')->references('id')->on('lessonhours')->onDelete('cascade');
              $table->foreign('players_id')->references('id')->on('players')->onDelete('cascade');
         });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lessonhour_player');
        Schema::drop('lessonhours');
    }
}
