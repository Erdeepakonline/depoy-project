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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid', 50)->index('uid');
            $table->enum('auth_provider', ['admin', 'facebook', 'google', 'twitter', 'custom', '7api', '7sinfoapi', '7sinapi', '7susapi']);
            $table->string('user_name', 50)->nullable()->default('0');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100)->unique('users_email_unique');
            $table->string('phonecode', 5)->nullable();
            $table->string('phone', 20)->nullable();
            $table->double('wallet')->default(0);
            $table->double('pub_wallet')->default(0);
            $table->string('website_category', 100)->nullable()->index('website_category');
            $table->string('password', 250);
            $table->string('login_token')->nullable();
            $table->string('address_line1', 100)->nullable();
            $table->string('address_line2', 100)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 25)->nullable();
            $table->integer('post_code')->nullable();
            $table->string('country', 25)->nullable();
            $table->string('user_photo')->nullable();
            $table->string('user_photo_id')->nullable();
            $table->boolean('photo_verified')->default(false)->comment('0-> not uploaded 1->pending 2->accepted 3->Rejected');
            $table->boolean('photo_id_verified')->default(false)->comment('0-> not uploaded 1->pending 2->accepted 3->Rejected');
            $table->text('user_photo_remark')->nullable();
            $table->text('user_photo_id_remark')->nullable();
            $table->string('payout_method', 15)->nullable();
            $table->double('withdrawl_limit')->default(0);
            $table->boolean('status')->default(false)->comment('0-Active, 1-Inactive, 2-Pending, 3-Suspended, 4-Hold');
            $table->tinyInteger('profile_lock')->default(0)->comment('0->Unlock, 1->Locked');
            $table->boolean('critical')->default(false)->comment('	0-> No , 1->Yes');
            $table->boolean('trash')->default(false)->comment('0-Not Deleted 1- Deleted');
            $table->string('del_remark')->nullable();
            $table->string('pub_noti_token')->nullable();
            $table->boolean('user_type')->default(true)->comment('1-advertiser, 2-publisher, 3-both');
            $table->boolean('account_type')->default(false)->comment('0-Client, 1-Inhouse');
            $table->boolean('ac_verified')->default(false)->comment('0-pending, 1-verified');
            $table->string('verify_code', 10)->nullable();
            $table->string('messenger_name', 30)->nullable();
            $table->string('messenger_type', 30)->nullable();
            $table->string('ip', 250)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['uid'], 'users_uid_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
