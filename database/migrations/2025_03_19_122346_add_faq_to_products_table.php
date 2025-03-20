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
    Schema::table('products', function (Blueprint $table) {
        $table->text('faq')->nullable()->after('product_specification'); // Replace 'column_name' with the correct previous column
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('faq');
    });
}
};