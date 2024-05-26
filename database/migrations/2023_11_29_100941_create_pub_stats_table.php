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
        Schema::create('pub_stats', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('uni_pub_imp_id', 250)->nullable();
            $table->string('publisher_code', 100)->nullable();
            $table->string('adunit_id', 100)->nullable();
            $table->string('website_id', 100)->nullable();
            $table->string('device_type', 50);
            $table->string('device_os', 50)->nullable();
            $table->integer('impressions')->default(0);
            $table->integer('clicks')->default(0);
            $table->double('amount')->default(0);
            $table->string('country', 100);
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
        Schema::dropIfExists('pub_stats');
    }
};
