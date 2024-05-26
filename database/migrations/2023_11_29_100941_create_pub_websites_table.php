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
        Schema::create('pub_websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 200)->index('uid');
            $table->string('u_email', 30)->nullable();
            $table->string('category_name', 20)->nullable();
            $table->integer('website_category')->index('website_category');
            $table->string('web_code', 50)->nullable()->index('web_code');
            $table->text('site_url');
            $table->boolean('verify')->default(false)->comment('0-Unverified, 1- Verified');
            $table->boolean('status')->default(true)->comment('1-Unverified, 2-Verified, 3- Hold, 4- Approved, 5- Suspended, 6- Rejected');
            $table->text('remark')->nullable();
            $table->boolean('trash')->default(false)->comment('0-Not Deleted, 1- Deleted');
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
        Schema::dropIfExists('pub_websites');
    }
};
