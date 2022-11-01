<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_settings', function (Blueprint $table) {
            $table->integer('shop_id')->primary();
            $table->string('shop_name', 55);
            $table->string('description', 160);
            $table->integer('warehouse');
            $table->integer('biller');
            $table->string('about_link', 55);
            $table->string('terms_link', 55);
            $table->string('privacy_link', 55);
            $table->string('contact_link', 55);
            $table->string('payment_text', 100);
            $table->string('follow_text', 100);
            $table->string('facebook', 55);
            $table->string('twitter', 55)->nullable();
            $table->string('google_plus', 55)->nullable();
            $table->string('instagram', 55)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('email', 55)->nullable();
            $table->string('cookie_message', 180)->nullable();
            $table->string('cookie_link', 55)->nullable();
            $table->text('slider')->nullable();
            $table->integer('shipping')->nullable();
            $table->string('purchase_code', 100)->nullable()->default('purchase_code');
            $table->string('envato_username', 50)->nullable()->default('envato_username');
            $table->string('version', 10)->nullable()->default('3.4.53');
            $table->string('logo', 55)->nullable();
            $table->string('bank_details')->nullable();
            $table->boolean('products_page')->nullable();
            $table->boolean('hide0')->nullable()->default(false);
            $table->string('products_description')->nullable();
            $table->boolean('private')->nullable()->default(false);
            $table->boolean('hide_price')->nullable()->default(false);
            $table->boolean('stripe')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_settings');
    }
}
