<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->integer('setting_id')->primary();
            $table->string('logo');
            $table->string('logo2');
            $table->string('site_name', 55);
            $table->string('language', 20);
            $table->integer('default_warehouse');
            $table->tinyInteger('accounting_method')->default(0);
            $table->string('default_currency', 3);
            $table->integer('default_tax_rate');
            $table->integer('rows_per_page');
            $table->string('version', 10)->default('1.0');
            $table->integer('default_tax_rate2')->default(0);
            $table->integer('dateformat');
            $table->string('product_prefix', 20)->nullable();
            $table->string('sales_prefix', 20)->nullable();
            $table->string('quote_prefix', 20)->nullable();
            $table->string('purchase_prefix', 20)->nullable();
            $table->string('transfer_prefix', 20)->nullable();
            $table->string('delivery_prefix', 20)->nullable();
            $table->string('payment_prefix', 20)->nullable();
            $table->string('return_prefix', 20)->nullable();
            $table->string('returnp_prefix', 20)->nullable();
            $table->string('expense_prefix', 20)->nullable();
            $table->boolean('item_addition')->default(false);
            $table->string('theme', 20);
            $table->tinyInteger('product_serial');
            $table->integer('default_discount');
            $table->boolean('product_discount')->default(false);
            $table->tinyInteger('discount_method');
            $table->tinyInteger('tax1');
            $table->tinyInteger('tax2');
            $table->boolean('overselling')->default(false);
            $table->tinyInteger('restrict_user')->default(0);
            $table->tinyInteger('restrict_calendar')->default(0);
            $table->string('timezone', 100)->nullable();
            $table->integer('iwidth')->default(0);
            $table->integer('iheight');
            $table->integer('twidth');
            $table->integer('theight');
            $table->boolean('watermark')->nullable();
            $table->boolean('reg_ver')->nullable();
            $table->boolean('allow_reg')->nullable();
            $table->boolean('reg_notification')->nullable();
            $table->boolean('auto_reg')->nullable();
            $table->string('protocol', 20)->default('mail');
            $table->string('mailpath', 55)->nullable()->default('/usr/sbin/sendmail');
            $table->string('smtp_host', 100)->nullable();
            $table->string('smtp_user', 100)->nullable();
            $table->string('smtp_pass')->nullable();
            $table->string('smtp_port', 10)->nullable()->default('25');
            $table->string('smtp_crypto', 10)->nullable();
            $table->dateTime('corn')->nullable();
            $table->integer('customer_group');
            $table->string('default_email', 100);
            $table->boolean('mmode');
            $table->tinyInteger('bc_fix')->default(0);
            $table->boolean('auto_detect_barcode')->default(false);
            $table->boolean('captcha')->default(true);
            $table->boolean('reference_format')->default(true);
            $table->boolean('racks')->nullable()->default(false);
            $table->boolean('attributes')->default(false);
            $table->boolean('product_expiry')->default(false);
            $table->tinyInteger('decimals')->default(2);
            $table->tinyInteger('qty_decimals')->default(2);
            $table->string('decimals_sep', 2)->default('.');
            $table->string('thousands_sep', 2)->default(',');
            $table->boolean('invoice_view')->nullable()->default(false);
            $table->integer('default_biller')->nullable();
            $table->string('envato_username', 50)->nullable();
            $table->string('purchase_code', 100)->nullable();
            $table->boolean('rtl')->nullable()->default(false);
            $table->decimal('each_spent', 15, 4)->nullable();
            $table->tinyInteger('ca_point')->nullable();
            $table->decimal('each_sale', 15, 4)->nullable();
            $table->tinyInteger('sa_point')->nullable();
            $table->boolean('update')->nullable()->default(false);
            $table->boolean('sac')->nullable()->default(false);
            $table->boolean('display_all_products')->nullable()->default(false);
            $table->boolean('display_symbol')->nullable();
            $table->string('symbol', 50)->nullable();
            $table->boolean('remove_expired')->nullable()->default(false);
            $table->string('barcode_separator', 2)->default('-');
            $table->boolean('set_focus')->default(false);
            $table->integer('price_group')->nullable();
            $table->boolean('barcode_img')->default(true);
            $table->string('ppayment_prefix', 20)->nullable()->default('POP');
            $table->smallInteger('disable_editing')->nullable()->default(90);
            $table->string('qa_prefix', 55)->nullable();
            $table->boolean('update_cost')->nullable();
            $table->boolean('apis')->default(false);
            $table->string('state', 100)->nullable();
            $table->string('pdf_lib', 20)->nullable()->default('dompdf');
            $table->boolean('use_code_for_slug')->nullable();
            $table->string('ws_barcode_type', 10)->nullable()->default('weight');
            $table->tinyInteger('ws_barcode_chars')->nullable();
            $table->tinyInteger('flag_chars')->nullable();
            $table->tinyInteger('item_code_start')->nullable();
            $table->tinyInteger('item_code_chars')->nullable();
            $table->tinyInteger('price_start')->nullable();
            $table->tinyInteger('price_chars')->nullable();
            $table->integer('price_divide_by')->nullable();
            $table->tinyInteger('weight_start')->nullable();
            $table->tinyInteger('weight_chars')->nullable();
            $table->integer('weight_divide_by')->nullable();
            $table->boolean('ksa_qrcode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
