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
        Schema::create('support_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('support_id', 50)->index('support_id');
            $table->string('ticket_no', 200)->nullable()->index('delete_log');
            $table->text('message');
            $table->text('file');
            $table->boolean('status')->default(true);
            $table->string('created_by', 50);
            $table->string('user_id', 250)->nullable()->index('user_id');
            $table->string('user_name', 250)->nullable();
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
        Schema::dropIfExists('support_logs');
    }
};
