<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->mediumText ('description');
            $table->string ('location');
            $table->date ('Due_Date');
            $table->integer ('Active')->nullable();
            $table->string ('cause_image');
            $table->string ('documentation_image')->nullable();
            // $table->unsignedInteger('user_id')
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
        Schema::dropIfExists('causes');
    }
}
