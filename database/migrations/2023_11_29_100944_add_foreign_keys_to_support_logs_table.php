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
        Schema::table('support_logs', function (Blueprint $table) {
            $table->foreign(['ticket_no'], 'delete_log')->references(['ticket_no'])->on('supports')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_logs', function (Blueprint $table) {
            $table->dropForeign('delete_log');
        });
    }
};
