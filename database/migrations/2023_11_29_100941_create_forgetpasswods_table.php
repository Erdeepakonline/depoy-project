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
        Schema::create('forgetpasswods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 200)->index('uid');
            $table->string('key_auth', 100);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->date('date');
            $table->string('link_url', 300);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('forgetpasswods');
    }
};
