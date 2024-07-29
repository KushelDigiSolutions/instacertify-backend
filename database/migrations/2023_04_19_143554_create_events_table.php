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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title',500);
            $table->string('slug')->nullable();
            $table->text('short_description');
            $table->text('description');
            $table->text('images');
            $table->bigInteger('number_of_tickets')->default('0');
            $table->text('location');
            $table->text('category_ids');
            $table->string('date')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->enum('single_day', ['1', '0'])->default('0');
            $table->enum('all_day', ['1', '0'])->default('0');
            $table->enum('is_active', ['1', '0'])->default('0');
            $table->enum('is_delete', ['1', '0'])->default('0');
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
        Schema::dropIfExists('events');
    }
};
