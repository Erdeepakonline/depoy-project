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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id')->index('id');
            $table->string('cat_name', 100);
            $table->double('cpm')->default(0);
            $table->double('cpc')->default(0);
            $table->double('cpa_imp')->default(0);
            $table->double('cpa_click')->default(0);
            $table->double('video_adv')->default(0);
            $table->double('video_pub')->default(0);
            $table->double('pub_cpm')->default(0);
            $table->double('pub_cpc')->default(0);
            $table->tinyInteger('display_brand')->default(1)->comment('1-> Enable, 0-> Disable');
            $table->boolean('status')->nullable()->default(true)->comment('0- Inactive, 1-Active');
            $table->boolean('trash')->nullable()->default(false)->comment('0-NotDeleted, 1-Deleted');
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
        Schema::dropIfExists('categories');
    }
};
