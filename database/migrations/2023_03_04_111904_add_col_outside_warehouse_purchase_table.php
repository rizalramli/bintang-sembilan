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
        Schema::table('outside_warehouse_purchase', function (Blueprint $table) {
            $table->integer('fare_truck')->after('fee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outside_warehouse_purchase', function (Blueprint $table) {
            $table->dropColumn('fare_truck');
        });
    }
};
