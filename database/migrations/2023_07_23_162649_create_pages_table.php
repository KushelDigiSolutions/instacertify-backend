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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('created_by');
            $table->string('title')->nullable();
            $table->string('custom_url')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->bigInteger('header_id')->default('0');
            $table->bigInteger('footer_id')->default('0');
            $table->bigInteger('navigation_id')->default('0');
            $table->text('html')->nullable();
            $table->enum('is_published', ['1', '0'])->default('0');
            $table->enum('is_homepage', ['1', '0'])->default('0');
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
        Schema::dropIfExists('pages');
    }
};
