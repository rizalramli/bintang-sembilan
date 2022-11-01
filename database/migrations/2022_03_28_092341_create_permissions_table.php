<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('group_id');
            $table->boolean('products-index')->nullable()->default(false);
            $table->boolean('products-add')->nullable()->default(false);
            $table->boolean('products-edit')->nullable()->default(false);
            $table->boolean('products-delete')->nullable()->default(false);
            $table->boolean('products-cost')->nullable()->default(false);
            $table->boolean('products-price')->nullable()->default(false);
            $table->boolean('quotes-index')->nullable()->default(false);
            $table->boolean('quotes-add')->nullable()->default(false);
            $table->boolean('quotes-edit')->nullable()->default(false);
            $table->boolean('quotes-pdf')->nullable()->default(false);
            $table->boolean('quotes-email')->nullable()->default(false);
            $table->boolean('quotes-delete')->nullable()->default(false);
            $table->boolean('sales-index')->nullable()->default(false);
            $table->boolean('sales-add')->nullable()->default(false);
            $table->boolean('sales-edit')->nullable()->default(false);
            $table->boolean('sales-pdf')->nullable()->default(false);
            $table->boolean('sales-email')->nullable()->default(false);
            $table->boolean('sales-delete')->nullable()->default(false);
            $table->boolean('purchases-index')->nullable()->default(false);
            $table->boolean('purchases-add')->nullable()->default(false);
            $table->boolean('purchases-edit')->nullable()->default(false);
            $table->boolean('purchases-pdf')->nullable()->default(false);
            $table->boolean('purchases-email')->nullable()->default(false);
            $table->boolean('purchases-delete')->nullable()->default(false);
            $table->boolean('transfers-index')->nullable()->default(false);
            $table->boolean('transfers-add')->nullable()->default(false);
            $table->boolean('transfers-edit')->nullable()->default(false);
            $table->boolean('transfers-pdf')->nullable()->default(false);
            $table->boolean('transfers-email')->nullable()->default(false);
            $table->boolean('transfers-delete')->nullable()->default(false);
            $table->boolean('customers-index')->nullable()->default(false);
            $table->boolean('customers-add')->nullable()->default(false);
            $table->boolean('customers-edit')->nullable()->default(false);
            $table->boolean('customers-delete')->nullable()->default(false);
            $table->boolean('suppliers-index')->nullable()->default(false);
            $table->boolean('suppliers-add')->nullable()->default(false);
            $table->boolean('suppliers-edit')->nullable()->default(false);
            $table->boolean('suppliers-delete')->nullable()->default(false);
            $table->boolean('sales-deliveries')->nullable()->default(false);
            $table->boolean('sales-add_delivery')->nullable()->default(false);
            $table->boolean('sales-edit_delivery')->nullable()->default(false);
            $table->boolean('sales-delete_delivery')->nullable()->default(false);
            $table->boolean('sales-email_delivery')->nullable()->default(false);
            $table->boolean('sales-pdf_delivery')->nullable()->default(false);
            $table->boolean('sales-gift_cards')->nullable()->default(false);
            $table->boolean('sales-add_gift_card')->nullable()->default(false);
            $table->boolean('sales-edit_gift_card')->nullable()->default(false);
            $table->boolean('sales-delete_gift_card')->nullable()->default(false);
            $table->boolean('pos-index')->nullable()->default(false);
            $table->boolean('sales-return_sales')->nullable()->default(false);
            $table->boolean('reports-index')->nullable()->default(false);
            $table->boolean('reports-warehouse_stock')->nullable()->default(false);
            $table->boolean('reports-quantity_alerts')->nullable()->default(false);
            $table->boolean('reports-expiry_alerts')->nullable()->default(false);
            $table->boolean('reports-products')->nullable()->default(false);
            $table->boolean('reports-daily_sales')->nullable()->default(false);
            $table->boolean('reports-monthly_sales')->nullable()->default(false);
            $table->boolean('reports-sales')->nullable()->default(false);
            $table->boolean('reports-payments')->nullable()->default(false);
            $table->boolean('reports-purchases')->nullable()->default(false);
            $table->boolean('reports-profit_loss')->nullable()->default(false);
            $table->boolean('reports-customers')->nullable()->default(false);
            $table->boolean('reports-suppliers')->nullable()->default(false);
            $table->boolean('reports-staff')->nullable()->default(false);
            $table->boolean('reports-register')->nullable()->default(false);
            $table->boolean('sales-payments')->nullable()->default(false);
            $table->boolean('purchases-payments')->nullable()->default(false);
            $table->boolean('purchases-expenses')->nullable()->default(false);
            $table->boolean('products-adjustments')->default(false);
            $table->boolean('bulk_actions')->default(false);
            $table->boolean('customers-deposits')->default(false);
            $table->boolean('customers-delete_deposit')->default(false);
            $table->boolean('products-barcode')->default(false);
            $table->boolean('purchases-return_purchases')->default(false);
            $table->boolean('reports-expenses')->default(false);
            $table->boolean('reports-daily_purchases')->nullable()->default(false);
            $table->boolean('reports-monthly_purchases')->nullable()->default(false);
            $table->boolean('products-stock_count')->nullable()->default(false);
            $table->boolean('edit_price')->nullable()->default(false);
            $table->boolean('returns-index')->nullable()->default(false);
            $table->boolean('returns-add')->nullable()->default(false);
            $table->boolean('returns-edit')->nullable()->default(false);
            $table->boolean('returns-delete')->nullable()->default(false);
            $table->boolean('returns-email')->nullable()->default(false);
            $table->boolean('returns-pdf')->nullable()->default(false);
            $table->boolean('reports-tax')->nullable()->default(false);
            $table->boolean('purchases-verification')->nullable();
            $table->boolean('purchases-received')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
