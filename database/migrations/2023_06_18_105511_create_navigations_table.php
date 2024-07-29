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
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('added_by');
            $table->string('title');
            $table->string('background_color');
            $table->string('text_link_color');
            $table->string('hover_background_color');
            $table->string('link_hover_color');
            $table->string('parent_text_color');
            $table->string('parent_text_hover_color');
            $table->text('items');
            $table->enum('is_published', ['1', '0'])->default('0');
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
        Schema::dropIfExists('navigations');
    }
};
