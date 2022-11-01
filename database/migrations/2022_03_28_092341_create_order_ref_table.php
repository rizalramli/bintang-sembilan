<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_ref', function (Blueprint $table) {
            $table->integer('ref_id', true);
            $table->date('date');
            $table->integer('so')->default(1);
            $table->integer('qu')->default(1);
            $table->integer('po')->default(1);
            $table->integer('to')->default(1);
            $table->integer('pos')->default(1);
            $table->integer('do')->default(1);
            $table->integer('pay')->default(1);
            $table->integer('re')->default(1);
            $table->integer('rep')->default(1);
            $table->integer('ex')->default(1);
            $table->integer('ppay')->default(1);
            $table->integer('qa')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_ref');
    }
}
