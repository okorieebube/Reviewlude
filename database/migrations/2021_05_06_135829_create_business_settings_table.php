<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

// + Options
// Full texts 	id 	unique_id 	user_type 	email 	first_name 	last_name 	password 	website 	company_name 	job_title 	phone 	is_email_validated 	is_blocked 	remember_token 	deleted_at 	created_at 	updated_at

// - company profile include:  description, company logo, street address, zip code, city, country, email[disabled]
    public function up()
    {
        Schema::create('business_settings', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->text('description')->nullable();
            $table->string('street_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('business_settings');
    }
}
