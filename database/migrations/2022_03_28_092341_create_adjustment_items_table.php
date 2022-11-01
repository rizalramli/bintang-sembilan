<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjustmentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_items', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('adjustment_id')->index('adjustment_id');
            $table->integer('product_id');
            $table->integer('option_id')->nullable();
            $table->decimal('quantity', 15, 4);
            $table->integer('warehouse_id');
            $table->string('serial_no')->nullable();
            $table->string('type', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjustment_items');
    }
}
