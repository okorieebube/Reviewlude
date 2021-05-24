<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // id, unique_id, user_id,review, star_rating, repy_main_id,

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('user_id');
            $table->string('product_id');
            $table->text('review');
            $table->string('star_rating');
            $table->string('repy_main_id')->nullable();
            $table->string('is_blocked');
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
        Schema::dropIfExists('reviews');
    }
}
