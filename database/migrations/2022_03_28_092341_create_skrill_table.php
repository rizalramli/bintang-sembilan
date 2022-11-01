<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkrillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skrill', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->tinyInteger('active');
            $table->string('account_email')->default('testaccount2@moneybookers.com');
            $table->string('secret_word', 20)->default('mbtest');
            $table->string('skrill_currency', 3)->default('USD');
            $table->decimal('fixed_charges', 25, 4)->default(0);
            $table->decimal('extra_charges_my', 25, 4)->default(0);
            $table->decimal('extra_charges_other', 25, 4)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skrill');
    }
}
