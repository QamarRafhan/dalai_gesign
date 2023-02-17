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
        Schema::create('fund_management', function (Blueprint $table) {
            $table->id();
            $table->integer('id_fund')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('source')->default(0);
            $table->float('value')->nullable();
            $table->string('currency')->nullable();
            $table->float('value_eur')->nullable();
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
        Schema::dropIfExists('fund_management');
    }
};
