<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('group_id')->nullable()->index('group_id_2');
            $table->string('group_name', 20);
            $table->integer('customer_group_id')->nullable();
            $table->string('customer_group_name', 100)->nullable();
            $table->string('name', 55);
            $table->string('company');
            $table->string('vat_no', 100)->nullable();
            $table->string('address')->nullable();
            $table->string('city', 55)->nullable();
            $table->string('state', 55)->nullable();
            $table->string('postal_code', 8)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100);
            $table->string('cf1', 100)->nullable();
            $table->string('cf2', 100)->nullable();
            $table->string('cf3', 100)->nullable();
            $table->string('cf4', 100)->nullable();
            $table->string('cf5', 100)->nullable();
            $table->string('cf6', 100)->nullable();
            $table->text('invoice_footer')->nullable();
            $table->integer('payment_term')->nullable()->default(0);
            $table->string('logo')->nullable()->default('logo.png');
            $table->integer('award_points')->nullable()->default(0);
            $table->decimal('deposit_amount', 25, 4)->nullable();
            $table->integer('price_group_id')->nullable();
            $table->string('price_group_name', 50)->nullable();
            $table->string('gst_no', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
