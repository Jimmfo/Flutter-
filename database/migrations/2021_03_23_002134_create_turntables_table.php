<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurntablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turntables', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('Mark');
            $table->string('Line');
            $table->string('Model');
            $table->tinyInteger('Voltage');
            $table->string('Playbackspeeds');
            $table->string('Audiooutputs');
            $table->string('WithUSB');
            $table->string('Recording');
            $table->string('TurntableMaterial');
            $table->string('Includescapsule');
            $table->text('Description');
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
        Schema::dropIfExists('turntables');
    }
}