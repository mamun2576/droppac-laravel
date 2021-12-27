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
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->float('wallet_balance')->nullable()->default('000000.00');
            $table->string('email')->unique();
            $table->BigInteger('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('apartment')->nullable();
            $table->string('community')->nullable();
            $table->string('parish')->nullable();
            $table->string('account')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
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
