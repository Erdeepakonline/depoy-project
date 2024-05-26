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
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id', 100);
            $table->string('advertiser_code', 100)->index('advertiser_code');
            $table->double('amount')->default(0);
            $table->enum('pay_type', ['debit', 'credit'])->nullable();
            $table->tinyInteger('cpn_typ')->default(0);
            $table->string('remark');
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
        Schema::dropIfExists('transaction_logs');
    }
};
