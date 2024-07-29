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
        Schema::create('event_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->default(0);
            $table->bigInteger('bigcommerce_id')->default(0);
            $table->bigInteger('bigcommerce_image_id')->default('0');
            $table->double('ticket_price',15,2)->default(0);
            $table->string('title',500)->nullable();
            $table->string('tag',200)->nullable();
            $table->string('name',500)->nullable();
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
        Schema::dropIfExists('event_types');
    }
};
