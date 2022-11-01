<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('date')->useCurrent();
            $table->string('reference', 50);
            $table->decimal('amount', 25, 4);
            $table->string('note', 1000)->nullable();
            $table->string('created_by', 55);
            $table->string('attachment', 55)->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('warehouse_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
