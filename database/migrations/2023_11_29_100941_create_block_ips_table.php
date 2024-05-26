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
        Schema::create('block_ips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip', 50);
            $table->string('uid', 200);
            $table->enum('ip_type', ['real', 'proxy']);
            $table->string('desc');
            $table->boolean('status')->default(false)->comment('0-InReview, 1-BLocked, 2-Unblocked');
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
        Schema::dropIfExists('block_ips');
    }
};
