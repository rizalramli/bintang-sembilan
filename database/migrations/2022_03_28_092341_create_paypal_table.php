<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaypalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->tinyInteger('active');
            $table->string('account_email');
            $table->string('paypal_currency', 3)->default('USD');
            $table->decimal('fixed_charges', 25, 4)->default(2);
            $table->decimal('extra_charges_my', 25, 4)->default(3.9);
            $table->decimal('extra_charges_other', 25, 4)->default(4.4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paypal');
    }
}
