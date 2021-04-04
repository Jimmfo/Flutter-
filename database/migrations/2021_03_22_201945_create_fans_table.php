<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fans', function (Blueprint $table) {
            $table->id();
            $table->string('Model');
            $table->string('Mark');
            $table->string('Price');
            $table->string('Seller');
            $table->string('Voltage');
            $table->string('Fantype');
            $table->tinyInteger('Power');
            $table->string('Speeds');
            $table->string('RemoteControl')->default(1);
            $table->text('Feeding');
            $table->string('Diameter');
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
        Schema::dropIfExists('fans');
    }
}
