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
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('coupon_id', 50)->nullable();
            $table->string('coupon_code', 50)->index('coupon_code');
            $table->enum('coupon_type', ['Percent', 'Flat']);
            $table->string('user_ids')->default('0')->index('user_ids')->comment('0-All Users');
            $table->double('min_bil_amt');
            $table->integer('coupon_value');
            $table->integer('max_disc');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('status')->default(true)->comment('0-Deactive, 1-Active');
            $table->text('userid_details')->nullable();
            $table->boolean('trash')->default(false)->comment('0- Notdeleted,1- Deleted');
            $table->integer('mailsend')->default(1);
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
        Schema::dropIfExists('coupons');
    }
};
