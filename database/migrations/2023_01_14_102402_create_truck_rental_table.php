<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_rental', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('number_vehicles',15)->nullable();
            $table->string('driver_name')->nullable();
            $table->string('loading_place')->nullable();
            $table->string('purpose')->nullable();
            $table->integer('truck_cost')->nullable();
            $table->integer('driver_cost')->nullable();
            $table->integer('solar_cost')->nullable();
            $table->integer('damage_cost')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('truck_rental');
    }
};
