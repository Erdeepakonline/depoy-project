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
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('notif_id')->nullable();
            $table->string('title', 100);
            $table->text('noti_desc');
            $table->boolean('noti_type')->default(true)->comment('1- Notification 2- offers');
            $table->boolean('noti_for')->default(true)->comment('1-advertiser 2-publisher 3-both');
            $table->text('display_url')->nullable();
            $table->boolean('status')->default(true)->comment('1-active 0-inactive');
            $table->tinyInteger('all_users')->default(0)->index('all_users')->comment('1 for all');
            $table->tinyInteger('trash')->nullable()->default(0)->comment('0- Not deleted 1- Deleted');
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
        Schema::dropIfExists('notifications');
    }
};
