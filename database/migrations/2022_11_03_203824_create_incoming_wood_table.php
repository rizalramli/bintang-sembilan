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
        Schema::create('incoming_wood', function (Blueprint $table) {
            $table->id();
            $table->integer('template_wood_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->integer('wood_type_id')->nullable();
            $table->integer('serial_number')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('number_vehicles',15)->nullable();
            $table->boolean('type')->nullable();
            $table->double('total_volume')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_wood');
    }
};
