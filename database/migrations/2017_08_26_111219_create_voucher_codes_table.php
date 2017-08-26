<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_codes', function (Blueprint $table) {
            $table->increments('voucher_code_id');
            $table->uuid('voucher_code_uuid');
            $table->integer('voucher_batch_id')->unsigned();
            $table->foreign('voucher_batch_id')->references('voucher_batch_id')
            ->on('voucher_batches')->onDelete('cascade');
            $table->string('code');
            $table->enum('status', ['disabled', 'enabled']);
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
        Schema::dropIfExists('voucher_codes');
    }
}
