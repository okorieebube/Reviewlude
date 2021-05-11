<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesToProductServicesTbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // id, unique_id, category_id, product_services_id,

        Schema::create('categories_to_product_services_tbs', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('category_id');
            $table->string('product_services_id');
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
        Schema::dropIfExists('categories_to_product_services_tbs');
    }
}
