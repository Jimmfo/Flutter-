<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('Price',2000);
            $table->string('Seller',3000);
            $table->string('Color');
            $table->string('Typecamera',255);
            $table->string('Resolution',5000);
            $table->tinyInteger('Screensize');
            $table->text('Connectivity');
            $table->string('ISOsensitivity');
            $table->string('Interfaces');
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
        Schema::dropIfExists('cameras');
    }
}
