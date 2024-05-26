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
        Schema::create('pub_payouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_id', 50);
            $table->string('publisher_id', 50)->index('publisher_id');
            $table->double('amount');
            $table->string('payout_method', 20);
            $table->string('payout_transaction_id', 30)->nullable();
            $table->boolean('status')->default(false)->comment('0-> Processing, 1-> Released, 2-> Hold');
            $table->date('release_date');
            $table->text('remark')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pub_payouts');
    }
};
