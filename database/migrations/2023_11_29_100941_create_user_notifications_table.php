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
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('noti_id')->index('noti_id');
            $table->text('notifuser_id')->nullable();
            $table->string('user_id', 200)->index('user_id');
            $table->boolean('user_type')->default(true);
            $table->boolean('view')->default(true);
            $table->tinyInteger('trash')->default(0)->comment('0=> Not Deleted, 1=> Deleted');
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
        Schema::dropIfExists('user_notifications');
    }
};
