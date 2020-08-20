<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVpProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->integer('prod_cate');
            $table->integer('id_type');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_price');
            $table->string('sale');
            $table->string('prod_img');
            $table->string('prod_warranty');
            $table->string('prod_accessories');
            $table->string('prod_condition');
            $table->string('prod_promotion');
            $table->string('prod_status');
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
        Schema::dropIfExists('vp_products');
    }
}
