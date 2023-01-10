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
            $table->integer('employee_id')->after('customer_id')->nullable();
            $table->integer('cargo_fee')->after('cost')->nullable();
            $table->integer('driver_salary')->after('cost')->nullable();
            $table->integer('fuel_cost')->after('cost')->nullable();
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
            $table->dropColumn('employee_id');
            $table->dropColumn('cargo_fee');
            $table->dropColumn('driver_salary');
            $table->dropColumn('fuel_cost');
        });
    }
};
