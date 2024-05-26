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
        Schema::create('pub_rate_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->string('category_name');
            $table->integer('country_id');
            $table->string('country_name');
            $table->double('cpc')->nullable()->default(0);
            $table->double('cpm')->default(0);
            $table->double('cpa_imp')->default(0);
            $table->double('cpa_click')->default(0);
            $table->double('video_adv')->default(0);
            $table->double('video_pub')->default(0);
            $table->double('pub_cpm')->default(0);
            $table->double('pub_cpc')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0-Active, 1-Inactive');
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
        Schema::dropIfExists('pub_rate_masters');
    }
};
