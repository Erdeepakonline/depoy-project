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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('advertiser_code', 100)->index('advertiser_code');
            $table->string('transaction_id', 100);
            $table->integer('category')->nullable();
            $table->string('payment_id', 100)->default('0');
            $table->string('payment_mode', 50);
            $table->double('amount')->default(0);
            $table->double('payble_amt');
            $table->string('fees_tax')->nullable()->default('0');
            $table->string('fee', 200)->nullable()->default('0');
            $table->string('gst', 200)->nullable()->default('0');
            $table->string('address', 100)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 25)->nullable();
            $table->integer('post_code')->nullable();
            $table->string('country', 25)->nullable();
            $table->string('cpn_id', 50)->nullable();
            $table->double('cpn_amt')->nullable()->default(0);
            $table->string('cpn_code', 30)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0- Pending, 1- Success, 2- Failed, 3-Returned');
            $table->string('remark')->nullable();
            $table->text('screenshot')->nullable();
            $table->string('gst_no', 50)->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
