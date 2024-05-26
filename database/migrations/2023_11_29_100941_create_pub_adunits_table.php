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
        Schema::create('pub_adunits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ad_code', 50)->index('ad_code');
            $table->string('uid', 50)->index('uid');
            $table->string('web_code', 50)->index('web_code');
            $table->string('ad_name', 50);
            $table->string('ad_type', 20);
            $table->tinyInteger('grid_type')->default(0);
            $table->tinyInteger('erotic_ads')->default(0)->comment('0-Allowed, 1- Not Allowed');
            $table->tinyInteger('alert_ads')->default(0)->comment('0- allowed, 1- not allowed');
            $table->text('site_url');
            $table->string('website_category', 20)->index('website_category');
            $table->bigInteger('impressions')->default(0);
            $table->bigInteger('clicks')->default(0);
            $table->string('category_name', 20);
            $table->boolean('status')->default(true)->comment('1-Inactive, 2-Active, 3-Hold, 4-Suspended');
            $table->boolean('trash')->default(false)->comment('0-Not deleted, 1- deleted');
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
        Schema::dropIfExists('pub_adunits');
    }
};
