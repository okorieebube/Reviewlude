<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Id, unique_id, user_id, name, total_reviews, score[4.9, 5.0], categories[],performance[excellent],tags[],
        Schema::create('products_services', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('total_reviews')->nullable();
            $table->string('score')->nullable();
            $table->string('tags')->nullable();
            $table->string('performance')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products_services');
    }
}
