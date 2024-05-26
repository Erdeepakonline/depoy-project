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
        Schema::create('ad_banner_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campaign_id', 50)->index('campaign_id');
            $table->string('advertiser_code', 50)->index('advertiser_code');
            $table->boolean('image_type')->default(false);
            $table->string('image_path');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_banner_images');
    }
};
