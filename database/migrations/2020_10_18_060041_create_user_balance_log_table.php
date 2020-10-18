<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBalanceLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_balance_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_balance_id')->unsigned()->nullable();
            $table->decimal('amount');
            $table->string('description');
            $table->timestamps();

            $table->foreign('user_balance_id', 'fk_ubl_user_balance_id')
                ->references('id')
                ->on('user_balances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_balance_logs', function (Blueprint $table) {
            $table->dropForeign('fk_ubl_user_balance_id');
        });

        Schema::dropIfExists('user_balance_logs');
    }
}
