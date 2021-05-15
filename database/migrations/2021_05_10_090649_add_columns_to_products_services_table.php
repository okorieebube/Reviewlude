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
            $table->text('description')->after('name');
            $table->string('category')->after('description');
            $table->string('cover_photo')->after('category');
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
            $table->dropColumn(['category', 'cover_photo', 'description']);
        });
    }
}
