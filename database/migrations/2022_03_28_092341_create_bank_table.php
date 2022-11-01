<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('bank', 35)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('cp', 30)->nullable();
            $table->string('hp', 20)->nullable();
            $table->float('mdr_debit_card', 10, 0)->nullable();
            $table->float('mdr_credit_card', 10, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank');
    }
}
