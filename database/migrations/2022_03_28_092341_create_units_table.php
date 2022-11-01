<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('code', 10);
            $table->string('name', 55);
            $table->integer('base_unit')->nullable()->index('base_unit');
            $table->string('operator', 1)->nullable();
            $table->string('unit_value', 55)->nullable();
            $table->string('operation_value', 55)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
