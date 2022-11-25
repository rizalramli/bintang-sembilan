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
        Schema::table('incoming_wood', function (Blueprint $table) {
            $table->string('serial_number',50)->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->string('proof_ownership',50)->after('serial_number')->nullable();
            $table->integer('total_qty')->after('type')->nullable();
            $table->string('description')->after('total_volume')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incoming_wood', function (Blueprint $table) {
            $table->integer('serial_number')->nullable()->change();
            $table->dateTime('date')->nullable()->change();
            $table->dropColumn('proof_ownership');
            $table->dropColumn('total_qty');
            $table->dropColumn('description');
        });
    }
};
