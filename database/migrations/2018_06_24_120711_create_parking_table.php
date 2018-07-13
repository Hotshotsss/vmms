<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_type_id');
            $table->integer('location_id')->nullable();
            $table->string('vehicle_model');
            $table->string('plate_number');
            $table->string('parking_reason');
            $table->dateTime('time_in');
            $table->dateTime('time_out')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->decimal('penalty',11,2)->nullable();
            $table->string('remarks')->nullable();
            $table->string('detailed_location')->nullable();
            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('parking');
    }
}
