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
        Schema::create('fund_operations', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_user')->nullable();
            $table->integer('ID_fund')->nullable();
            $table->dateTime('date')->nullable();
            $table->integer('month')->default(0);
            $table->integer('year')->nullable();
            $table->float('token_investment')->nullable();
            $table->float('eur_investment')->nullable();
            $table->float('num_tokens')->nullable();
            $table->float('value_beginning')->nullable();
            $table->float('value_imported')->nullable();
            $table->float('value_end')->nullable();
            $table->float('token_value')->nullable();
            $table->float('profit')->nullable();
            $table->float('increase')->nullable();
            $table->float('commissions')->nullable();

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
        Schema::dropIfExists('fund_operations');
    }
};
