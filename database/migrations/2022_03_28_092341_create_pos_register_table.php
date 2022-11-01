<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_register', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('date')->useCurrent();
            $table->integer('user_id');
            $table->decimal('cash_in_hand', 25, 4);
            $table->string('status', 10);
            $table->decimal('total_cash', 25, 4)->nullable();
            $table->integer('total_cheques')->nullable();
            $table->integer('total_cc_slips')->nullable();
            $table->decimal('total_cash_submitted', 25, 4)->nullable();
            $table->integer('total_cheques_submitted')->nullable();
            $table->integer('total_cc_slips_submitted')->nullable();
            $table->text('note')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->string('transfer_opened_bills', 50)->nullable();
            $table->integer('closed_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos_register');
    }
}
