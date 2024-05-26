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
        Schema::create('camp_budget_utilize', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uni_bd_id', 250)->unique('uni_bd_id');
            $table->string('advertiser_code', 100);
            $table->string('camp_id', 100)->nullable();
            $table->integer('impressions')->default(0);
            $table->integer('clicks')->default(0);
            $table->double('amount')->default(0);
            $table->date('udate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camp_budget_utilize');
    }
};
