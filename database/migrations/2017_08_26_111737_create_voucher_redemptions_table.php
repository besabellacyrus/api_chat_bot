<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherRedemptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_redemptions', function (Blueprint $table) {
            $table->increments('voucher_redemption_id');
            $table->uuid('voucher_redemption_uuid');
            $table->integer('user_id');
            $table->string('code');
            $table->integer('voucher_code_id')->unsigned();
            $table->foreign('voucher_code_id')->references('voucher_code_id')
            ->on('voucher_codes')->onDelete('cascade');
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
        Schema::dropIfExists('voucher_redemptions');
    }
}
