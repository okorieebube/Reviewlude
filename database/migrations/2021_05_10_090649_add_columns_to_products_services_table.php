<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProductsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_services', function (Blueprint $table) {
            $table->string('category')->after('name');
            $table->string('cover_photo')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_services', function (Blueprint $table) {
            //
            $table->dropColumn(['category', 'cover_photo']);
        });
    }
}
