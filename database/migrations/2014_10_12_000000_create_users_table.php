<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('user_type');
            $table->string('email');
            $table->string('full_name')->nullable();
            $table->text('password');
            $table->text('website')->nullable();
            $table->text('company_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('phone')->nullable();
            $table->string('is_email_validated')->default(false);
            $table->string('is_blocked')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
