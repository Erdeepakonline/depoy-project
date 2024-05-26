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
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('iso', 2);
            $table->string('name', 80)->index('name');
            $table->string('nicename', 80);
            $table->char('iso3', 3);
            $table->smallInteger('numcode');
            $table->char('phonecode', 5);
            $table->string('currency_code', 10)->nullable();
            $table->tinyInteger('status')->default(1)->comment('0-Inactive 1-Active');
            $table->tinyInteger('trash')->default(1)->comment('0-Deleted 1- Not Deleted');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('countries');
    }
};
