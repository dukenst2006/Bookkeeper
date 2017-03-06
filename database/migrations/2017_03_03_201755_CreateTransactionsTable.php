<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type', [
                'income',
                'expense'
            ]);

            $table->string('name');
            $table->bigInteger('amount');
            $table->unsignedInteger('account_id');
            $table->boolean('received');

            $table->text('notes');

            $table->timestamps();

            $table->index('type');
            $table->index('account_id');

            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
