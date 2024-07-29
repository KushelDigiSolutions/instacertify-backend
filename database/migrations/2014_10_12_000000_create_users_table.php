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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('company')->nullable();
            $table->bigInteger('bigcommerce_customer_id')->default(0);
            $table->string('email')->unique()->nullable();
            $table->bigInteger('mobile_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('language')->nullable();
            $table->string('timezone')->nullable();
            $table->string('address')->nullable();
            $table->enum('user_type', ['user', 'app'])->default('user');
            $table->string('api_token', 80)
            ->unique()
            ->nullable()
            ->default(null);
            $table->string('state')->nullable();
            $table->string('reset_code')->nullable();
            $table->string('city')->nullable();
            $table->enum('status', ['unblock', 'block'])->default('unblock');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
};
