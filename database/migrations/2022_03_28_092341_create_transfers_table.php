<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->string('transfer_no', 55);
            $table->timestamp('date')->useCurrent();
            $table->integer('from_warehouse_id');
            $table->string('from_warehouse_code', 55);
            $table->string('from_warehouse_name', 55);
            $table->integer('to_warehouse_id');
            $table->string('to_warehouse_code', 55);
            $table->string('to_warehouse_name', 55);
            $table->string('note', 1000)->nullable();
            $table->decimal('total', 25, 4)->nullable();
            $table->decimal('total_tax', 25, 4)->nullable();
            $table->decimal('grand_total', 25, 4)->nullable();
            $table->string('created_by')->nullable();
            $table->string('status', 55)->default('pending');
            $table->decimal('shipping', 25, 4)->default(0);
            $table->string('attachment', 55)->nullable();
            $table->decimal('cgst', 25, 4)->nullable();
            $table->decimal('sgst', 25, 4)->nullable();
            $table->decimal('igst', 25, 4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
}
