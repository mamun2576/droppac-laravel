<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->index()
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained();
            $table->json('recipient');
            $table->json('pickup_address');
            $table->json('delivery_address');
            $table->json('packages');
            $table->string('service');
            $table->float('declared_value',6,2)->nullable()->default('000000.00');
            $table->boolean('protection')->default(false);
            $table->json('handling')->nullable();
            $table->datetime('delivery_expected_on');
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
        Schema::dropIfExists('pickups');
    }
}
