<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
              ->index()
              ->onUpdate('cascade')
              ->onDelete('cascade')
              ->constrained();
            $table->float('amount_to_be_added',6,2)->nullable()->default('000000.00');
            $table->string('transaction_number');
            $table->string('bank_account');
            $table->string('status')->default('processing');
            $table->date('date_of_transaction');
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
        Schema::dropIfExists('topups');
    }
}
