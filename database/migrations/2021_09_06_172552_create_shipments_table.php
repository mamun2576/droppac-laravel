<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->default('1')
                  ->index()
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained();
            $table->string('number')->unique();
            $table->datetime('departs_on');
            $table->datetime('arrives_on');
            $table->string('carrier');
            $table->string('origin')->nullable();
            $table->string('destination');
            $table->string('vessel_number')->nullable();
            $table->string('freight_type')->default('air');
            $table->string('status');
            $table->uuid('uuid')->unique();
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
        Schema::dropIfExists('shipments');
    }
}
