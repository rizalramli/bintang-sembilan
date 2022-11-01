<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->timestamp('date')->useCurrent();
            $table->string('reference_no', 55);
            $table->integer('customer_id');
            $table->string('customer', 55);
            $table->integer('biller_id');
            $table->string('biller', 55);
            $table->integer('warehouse_id')->nullable();
            $table->string('note', 1000)->nullable();
            $table->string('staff_note', 1000)->nullable();
            $table->decimal('total', 25, 4);
            $table->decimal('product_discount', 25, 4)->nullable()->default(0);
            $table->string('order_discount_id', 20)->nullable();
            $table->decimal('total_discount', 25, 4)->nullable()->default(0);
            $table->decimal('order_discount', 25, 4)->nullable()->default(0);
            $table->decimal('product_tax', 25, 4)->nullable()->default(0);
            $table->integer('order_tax_id')->nullable();
            $table->decimal('order_tax', 25, 4)->nullable()->default(0);
            $table->decimal('total_tax', 25, 4)->nullable()->default(0);
            $table->decimal('grand_total', 25, 4);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->smallInteger('total_items')->nullable();
            $table->decimal('paid', 25, 4)->nullable()->default(0);
            $table->decimal('surcharge', 25, 4)->default(0);
            $table->string('attachment', 55)->nullable();
            $table->string('hash')->nullable();
            $table->decimal('cgst', 25, 4)->nullable();
            $table->decimal('sgst', 25, 4)->nullable();
            $table->decimal('igst', 25, 4)->nullable();
            $table->decimal('shipping', 25, 4)->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('returns');
    }
}
