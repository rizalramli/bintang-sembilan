<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costing', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('date');
            $table->integer('product_id')->nullable();
            $table->integer('sale_item_id');
            $table->integer('sale_id')->nullable();
            $table->integer('purchase_item_id')->nullable();
            $table->decimal('quantity', 15, 4);
            $table->decimal('purchase_net_unit_cost', 25, 4)->nullable();
            $table->decimal('purchase_unit_cost', 25, 4)->nullable();
            $table->decimal('sale_net_unit_price', 25, 4);
            $table->decimal('sale_unit_price', 25, 4);
            $table->decimal('quantity_balance', 15, 4)->nullable();
            $table->boolean('inventory')->nullable()->default(false);
            $table->boolean('overselling')->nullable()->default(false);
            $table->integer('option_id')->nullable();
            $table->integer('purchase_id')->nullable();
            $table->integer('transfer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costing');
    }
}
