<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIronsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irons', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('Mark',100);
            $table->string('Line',50);
            $table->string('Model',);
            $table->string('Color')->nullable();
            $table->tinyInteger('Voltage')->default(1);
            $table->string('Power');
            $table->string('Typeofiron');
            $table->string('Use');
            $table->text('Description');
            $table->string('Coment');
            
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
        Schema::dropIfExists('irons');
    }
}
