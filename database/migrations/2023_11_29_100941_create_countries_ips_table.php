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
        Schema::create('countries_ips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_addr', 100);
            $table->string('country_code', 50);
            $table->string('country_name', 55)->nullable();
            $table->string('state', 50);
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
        Schema::dropIfExists('countries_ips');
    }
};
