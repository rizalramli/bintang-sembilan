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
        Schema::create('outcoming_wood', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('wood_type_id')->nullable();
            $table->integer('serial_number')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('number_vehicles',15)->nullable();
            $table->integer('total_qty');
            $table->double('total_volume')->nullable();
            $table->integer('cost')->nullable();
            $table->string('description')->nullable();
            $table->boolean('type')->nullable();
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
        Schema::dropIfExists('outcoming_wood');
    }
};
