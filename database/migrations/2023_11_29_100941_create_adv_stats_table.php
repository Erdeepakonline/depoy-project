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
        Schema::create('adv_stats', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('advertiser_code', 50)->nullable();
            $table->string('uni_imp_id', 250)->unique('uni_imp_id');
            $table->string('camp_id', 50)->nullable();
            $table->integer('impressions')->default(0);
            $table->integer('clicks')->default(0);
            $table->double('amount')->nullable()->default(0);
            $table->string('device_type', 20)->nullable();
            $table->string('device_os', 20)->nullable();
            $table->string('country', 50)->nullable();
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
        Schema::dropIfExists('adv_stats');
    }
};
