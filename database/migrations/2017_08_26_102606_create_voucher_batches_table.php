<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_batches', function (Blueprint $table) {
            $table->increments('voucher_batch_id');
            $table->uuid('voucher_batch_uuid');
            $table->integer('voucher_id')->unsigned();
            $table->foreign('voucher_id')->references('voucher_id')
            ->on('vouchers')->onDelete('cascade');
            $table->integer('client_id');
            $table->string('name');
            $table->text('description');
            $table->enum('status', ['disabled', 'enabled']);
            $table->enum('type', ['absolute', 'relative']);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('relative_days');
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
        Schema::dropIfExists('voucher_batches');
    }
}
