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
            $table->integer('total_qty_tally')->after('total_volume')->nullable();
            $table->double('total_volume_tally')->after('total_volume')->nullable();
            $table->integer('total_qty_afkir')->after('total_volume')->nullable();
            $table->double('total_volume_afkir')->after('total_volume')->nullable();
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
            $table->dropColumn('total_qty_tally');
            $table->dropColumn('total_volume_tally');
            $table->dropColumn('total_qty_afkir');
            $table->dropColumn('total_volume_afkir');
        });
    }
};
