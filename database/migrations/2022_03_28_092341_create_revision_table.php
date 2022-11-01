<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision', function (Blueprint $table) {
            $table->integer('id', true)->index('id');
            $table->string('verification_status', 20)->nullable();
            $table->integer('admin_id')->nullable();
            $table->timestamp('verification_date')->nullable();
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
            $table->decimal('shipping', 25, 4)->nullable()->default(0);
            $table->decimal('grand_total', 25, 4);
            $table->string('sale_status', 20)->nullable();
            $table->string('payment_status', 20)->nullable();
            $table->tinyInteger('payment_term')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->smallInteger('total_items')->nullable();
            $table->boolean('pos')->default(false);
            $table->decimal('paid', 25, 4)->nullable()->default(0);
            $table->integer('return_id')->nullable();
            $table->decimal('surcharge', 25, 4)->default(0);
            $table->string('attachment', 55)->nullable();
            $table->string('return_sale_ref', 55)->nullable();
            $table->integer('sale_id')->nullable();
            $table->decimal('return_sale_total', 25, 4)->default(0);
            $table->decimal('rounding', 10, 4)->nullable();
            $table->string('suspend_note')->nullable();
            $table->boolean('api')->nullable()->default(false);
            $table->boolean('shop')->nullable()->default(false);
            $table->integer('address_id')->nullable();
            $table->integer('reserve_id')->nullable();
            $table->string('hash')->nullable();
            $table->string('manual_payment', 55)->nullable();
            $table->decimal('cgst', 25, 4)->nullable();
            $table->decimal('sgst', 25, 4)->nullable();
            $table->decimal('igst', 25, 4)->nullable();
            $table->string('payment_method', 55)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revision');
    }
}
