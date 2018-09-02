<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('manufacture_id')->nullable();
            $table->integer('user_id');
            $table->string('product_name',30);
            $table->longText('product_short_description');
            $table->longText('product_long_description')->nullable();
            $table->longText('product_send_conditions')->nullable();
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_quantity')->nullable();
            $table->string('product_color')->nullable();
            $table->integer('publication_status');
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
        Schema::dropIfExists('products');
    }
}
