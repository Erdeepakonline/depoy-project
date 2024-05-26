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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id')->index('id');
            $table->string('campaign_id', 50)->index('campaign_id');
            $table->integer('advertiser_id');
            $table->string('advertiser_code', 50)->index('advertiser_code');
            $table->string('device_type', 100);
            $table->string('device_os', 50)->index('device_os');
            $table->string('campaign_name', 100);
            $table->enum('ad_type', ['text', 'banner', 'video', 'native', 'social', 'popup'])->comment('text,banner,video,native,social,popup');
            $table->tinyInteger('social_ad_type')->default(0)->comment('1-Classic, 2-Social');
            $table->string('campaign_type', 20)->nullable();
            $table->string('ad_title', 100)->nullable();
            $table->string('ad_description', 250)->nullable();
            $table->text('target_url');
            $table->text('conversion_url')->nullable();
            $table->integer('website_category')->index('website_category');
            $table->double('daily_budget')->default(0);
            $table->enum('pricing_model', ['CPC', 'CPM', 'CPA'])->nullable();
            $table->double('cpc_amt')->default(0);
            $table->string('country_ids', 100)->nullable();
            $table->text('country_name')->nullable();
            $table->text('countries')->nullable();
            $table->boolean('priority')->default(false);
            $table->boolean('status')->default(true)->comment('0-Incomplete, 1-InReview, 2-Active, 3- InActive, 4-Paused, 5-OnHold, 6-Suspended');
            $table->boolean('trash')->default(false)->comment('0-Not Deleted, 1-Deleted');
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
        Schema::dropIfExists('campaigns');
    }
};
