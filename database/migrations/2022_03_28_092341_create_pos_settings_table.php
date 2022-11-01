<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_settings', function (Blueprint $table) {
            $table->integer('pos_id')->primary();
            $table->integer('cat_limit');
            $table->integer('pro_limit');
            $table->integer('default_category');
            $table->integer('default_customer');
            $table->integer('default_biller');
            $table->string('display_time', 3)->default('yes');
            $table->string('cf_title1')->nullable();
            $table->string('cf_title2')->nullable();
            $table->string('cf_value1')->nullable();
            $table->string('cf_value2')->nullable();
            $table->string('receipt_printer', 55)->nullable();
            $table->string('cash_drawer_codes', 55)->nullable();
            $table->string('focus_add_item', 55)->nullable();
            $table->string('add_manual_product', 55)->nullable();
            $table->string('customer_selection', 55)->nullable();
            $table->string('add_customer', 55)->nullable();
            $table->string('toggle_category_slider', 55)->nullable();
            $table->string('toggle_subcategory_slider', 55)->nullable();
            $table->string('cancel_sale', 55)->nullable();
            $table->string('suspend_sale', 55)->nullable();
            $table->string('print_items_list', 55)->nullable();
            $table->string('finalize_sale', 55)->nullable();
            $table->string('today_sale', 55)->nullable();
            $table->string('open_hold_bills', 55)->nullable();
            $table->string('close_register', 55)->nullable();
            $table->boolean('keyboard');
            $table->string('pos_printers')->nullable();
            $table->boolean('java_applet');
            $table->string('product_button_color', 20)->default('default');
            $table->boolean('tooltips')->nullable()->default(true);
            $table->boolean('paypal_pro')->nullable()->default(false);
            $table->boolean('stripe')->nullable()->default(false);
            $table->boolean('rounding')->nullable()->default(false);
            $table->tinyInteger('char_per_line')->nullable()->default(42);
            $table->string('pin_code', 20)->nullable();
            $table->string('purchase_code', 100)->nullable()->default('purchase_code');
            $table->string('envato_username', 50)->nullable()->default('envato_username');
            $table->string('version', 10)->nullable()->default('3.4.53');
            $table->boolean('after_sale_page')->nullable()->default(false);
            $table->boolean('item_order')->nullable()->default(false);
            $table->boolean('authorize')->nullable()->default(false);
            $table->string('toggle_brands_slider', 55)->nullable();
            $table->boolean('remote_printing')->nullable()->default(true);
            $table->integer('printer')->nullable();
            $table->string('order_printers', 55)->nullable();
            $table->boolean('auto_print')->nullable()->default(false);
            $table->boolean('customer_details')->nullable();
            $table->boolean('local_printers')->nullable();
            $table->string('check_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos_settings');
    }
}
