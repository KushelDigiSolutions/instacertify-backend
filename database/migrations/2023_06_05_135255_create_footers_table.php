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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->integer('added_by');
            $table->string('title');
            $table->string('background_color')->nullable();
            $table->text('global_title')->nullable();
            $table->text('sub_title')->nullable();
            $table->string('parent_text_color');
            $table->string('parent_text_hover_color');
            $table->string('footer_logo')->nullable();
            $table->text('items')->nullable();
            $table->enum('is_active', ['1', '0'])->default('0');
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
        Schema::dropIfExists('footers');
    }
};
