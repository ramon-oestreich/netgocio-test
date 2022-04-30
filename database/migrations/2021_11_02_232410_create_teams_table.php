<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->unsignedInteger('position');
            $table->string('team')->nullable();
            $table->string('name');
            $table->unsignedInteger('played');
            $table->unsignedInteger('won');
            $table->unsignedInteger('drawn');
            $table->unsignedInteger('lost');
            $table->unsignedInteger('goal');
            $table->integer('difference');
            $table->unsignedInteger('points');
            $table->string('logo_path');
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
        Schema::dropIfExists('teams');
    }
}
