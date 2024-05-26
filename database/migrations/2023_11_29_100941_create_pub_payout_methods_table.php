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
        Schema::create('pub_payout_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method_name', 50);
            $table->string('image', 200);
            $table->double('processing_fee');
            $table->double('min_withdrawl');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0->enable, 1->Disable');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->string('display_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pub_payout_methods');
    }
};
