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
        Schema::create('outside_warehouse_purchase', function (Blueprint $table) {
            $table->id();
            $table->integer('warehouse_id')->nullable();
            $table->string('destination')->nullable();
            $table->date('date')->nullable();
            $table->string('number_vehicles',15)->nullable();
            $table->integer('total_qty_sj')->nullable();
            $table->double('total_volume_sj')->nullable();
            $table->integer('total_qty_tally')->nullable();
            $table->double('total_volume_tally')->nullable();
            $table->integer('total_qty_afkir')->nullable();
            $table->double('total_volume_afkir')->nullable();
            $table->integer('payment_factory')->nullable();
            $table->integer('fare_down')->nullable();
            $table->integer('grand_total')->nullable();
            $table->integer('fee')->nullable();
            $table->integer('paid')->nullable();
            $table->integer('down_payment')->nullable();
            $table->integer('nett')->nullable();
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
        Schema::dropIfExists('outside_warehouse_purchase');
    }
};
