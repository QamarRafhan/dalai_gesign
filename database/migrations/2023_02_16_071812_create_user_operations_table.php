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
        Schema::create('user_operations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->integer('id_fund')->nullable();
            $table->integer('operacion_type')->default(0);
            $table->dateTime('date')->nullable();
            $table->float('amount')->nullable();
            $table->string('currency')->nullable();
            $table->float('amount_eur')->nullable();
            $table->float('amount_tokens')->nullable();
            $table->string('date_unblock')->nullable();
            $table->string('status')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('user_operations');
    }
};
