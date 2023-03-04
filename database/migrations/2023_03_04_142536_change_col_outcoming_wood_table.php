<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outcoming_wood', function (Blueprint $table) {
            $table->renameColumn('cost', 'nett');
            $table->renameColumn('fuel_cost', 'result');
            $table->renameColumn('driver_salary', 'fee');
            $table->renameColumn('cargo_fee', 'fare_truck');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outcoming_wood', function (Blueprint $table) {
            $table->renameColumn('nett', 'cost');
            $table->renameColumn('result', 'fuel_cost');
            $table->renameColumn('fee', 'driver_salary');
            $table->renameColumn('fare_truck', 'cargo_fee');
        });
    }
};
