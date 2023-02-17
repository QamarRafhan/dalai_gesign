<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id')->default(2)->comment('1=Admin, 2=TA/TP');
            $table->tinyInteger('status')->default(1);
            $table->integer('id_agent')->nullable();
            $table->integer('id_company')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('cp')->nullable();
            $table->string('country')->nullable();
            $table->string('dni')->nullable();
            $table->string('payment_mode')->nullable();
            $table->float('account_balance')->nullable();
            $table->float('token_balance')->nullable();
            $table->string('funds_source')->nullable();
            $table->float('profit')->nullable();
            $table->longText('funds')->nullable();
            $table->float('commission_rate')->nullable();
            $table->integer('mailchimp')->nullable();
            $table->integer('telegram')->nullable();
            $table->string('comments')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
