<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->index()
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained();

            $table->string('account');
            $table->foreign('account')
                  ->index()
                  ->references('account')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained();

            $table->foreignId('shipment_id')->nullable()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('ground_tracking')->unique();
            $table->string('tracking_number')->nullable();
            $table->string('shipper')->nullable();
            $table->text('description')->nullable();
            $table->string('consignee')->nullable();
            $table->float('weight',4,2)->nullable()->default('000000.00');
            $table->float('height',4,2)->nullable()->default('000000.00');
            $table->float('length',4,2)->nullable()->default('000000.00');
            $table->float('width',4,2)->nullable()->default('000000.00');
            $table->string('waybill')->nullable();
            $table->string('courier')->nullable();
            $table->float('declared_value',6,2)->nullable()->default('000000.00');
            $table->uuid('uuid')->unique()->nullable();
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
        Schema::dropIfExists('packages');
    }
}
