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
        Schema::create('supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 200)->nullable()->index('uid');
            $table->string('ticket_no', 50)->unique('ss_support_ticket_no_unique');
            $table->string('category', 50)->nullable()->comment('feedback,suggestion,complaint');
            $table->string('sub_category', 200)->nullable()->comment('bill & payment,sales,campaign issue,other');
            $table->string('support_type', 50);
            $table->string('subject', 50);
            $table->text('message');
            $table->text('file');
            $table->boolean('status')->default(true)->comment('1- Open, 2-In Progress, 3-On Hold, 4-Customer Action Pending, 5-Closed, 6-Re Open');
            $table->string('priority', 100)->nullable();
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
        Schema::dropIfExists('supports');
    }
};
