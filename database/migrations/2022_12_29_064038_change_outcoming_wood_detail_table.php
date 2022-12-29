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
        Schema::table('outcoming_wood_detail', function (Blueprint $table) {
            $table->dropColumn('wood_type_out_id');
            $table->dropColumn('length');
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('volume');
            $table->renameColumn('qty', 'sub_total_qty');
            $table->integer('product_id')->after('outcoming_wood_id')->nullable();
            $table->double('sub_total_volume')->after('qty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outcoming_wood_detail', function (Blueprint $table) {
            $table->integer('wood_type_out_id')->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('volume')->nullable();
            $table->renameColumn('sub_total_qty', 'qty');
            $table->dropColumn('product_id');
            $table->dropColumn('sub_total_volume');
        });
    }
};
