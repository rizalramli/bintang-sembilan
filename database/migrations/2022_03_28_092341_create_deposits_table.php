<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('date')->useCurrent();
            $table->integer('company_id');
            $table->decimal('amount', 25, 4);
            $table->string('paid_by', 50)->nullable();
            $table->string('note')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
