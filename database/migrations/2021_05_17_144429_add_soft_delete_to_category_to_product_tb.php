<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToCategoryToProductTb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories_to_product_services_tbs', function (Blueprint $table) {
            //
            $table->softDeletes()->after('product_services_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories_to_product_services_tbs', function (Blueprint $table) {
            //
        Schema::dropIfExists('deleted_at');
        });
    }
}
