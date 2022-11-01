<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCardTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_card_topups', function (Blueprint $table) {
            $table->integer('id', true);
            $table->timestamp('date')->useCurrentOnUpdate()->useCurrent();
            $table->integer('card_id')->index('card_id');
            $table->decimal('amount', 15, 4);
            $table->integer('created_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gift_card_topups');
    }
}
