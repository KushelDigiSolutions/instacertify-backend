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
        Schema::table('vclasses', function (Blueprint $table) {
            // Change the column type to boolean
            $table->boolean('is_active')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vclasses', function (Blueprint $table) {
            // Revert the column type change if needed
            $table->integer('is_active')->default(0)->change();
        });
    }
};
