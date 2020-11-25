<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->unsignedBigInteger('make_id');
            $table->string('range');
            $table->string('model');
            $table->string('derivative');
            $table->double('price');
            $table->string('colour');
            $table->string('mileage');
            $table->string('vehicle_type');
            $table->date('date_on_forecourt');
            $table->boolean('active')->default(0);

            $table->foreign('make_id')->references('id')->on('makes');  
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
        Schema::dropIfExists('vehicles');
    }
}
