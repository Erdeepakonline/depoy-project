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
        Schema::create('pub_document_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->index('uid');
            $table->string('doc_type');
            $table->boolean('status')->default(false)->comment('0- Not Uploaded, 1- Pending, 2- Accepted, 3- Rejected');
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('pub_document_logs');
    }
};
