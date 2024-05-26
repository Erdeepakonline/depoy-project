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
        Schema::create('ad_impressions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('impression_id', 50);
            $table->string('ad_session_id', 50)->nullable();
            $table->string('campaign_id', 50);
            $table->string('advertiser_code', 50)->index('advertiser_code');
            $table->string('publisher_code', 50)->nullable()->index('publisher_code');
            $table->string('adunit_id', 50)->nullable();
            $table->string('website_id', 50)->nullable();
            $table->string('device_type', 20);
            $table->string('device_os', 20);
            $table->string('ad_type', 20);
            $table->integer('website_category')->default(0);
            $table->double('amount')->default(0);
            $table->double('pub_imp_credit')->default(0);
            $table->string('ip_addr', 50);
            $table->string('uni_imp_id')->nullable();
            $table->string('uni_bd_id', 250);
            $table->string('country', 30)->nullable();
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
        Schema::dropIfExists('ad_impressions');
    }
};
