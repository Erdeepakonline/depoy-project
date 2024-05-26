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
        Schema::create('user_camp_click_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaign_id', 50)->index('campaign_id');
            $table->string('advertiser_code', 50)->index('advertiser_code');
            $table->string('publisher_code', 50)->nullable()->index('publisher_code');
            $table->string('adunit_id', 50)->nullable();
            $table->string('website_id', 50)->nullable();
            $table->string('ad_session_id', 50)->nullable()->index('ad_session_id');
            $table->string('device_type', 20)->nullable();
            $table->string('device_os', 20)->nullable();
            $table->string('ad_type', 20)->nullable();
            $table->integer('website_category')->default(0);
            $table->string('country', 20)->nullable();
            $table->string('ip_address', 20);
            $table->string('uni_imp_id')->nullable();
            $table->string('uni_bd_id', 250)->nullable();
            $table->double('amount')->default(0);
            $table->double('pub_click_credit')->default(0);
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
        Schema::dropIfExists('user_camp_click_logs');
    }
};
