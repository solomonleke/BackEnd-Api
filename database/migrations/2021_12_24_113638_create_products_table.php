<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("Description")->nullable();
            $table->string("Picture_url1");
            $table->string("Picture_url2")->nullable();
            $table->string("Picture_url3")->nullable();
            $table->string("Picture_url4")->nullable();
            $table->string("Color");
            $table->string("Size");
            $table->string("Price");
            $table->string("SlicedPercentage")->nullable();
            $table->string("Additional Info")->nullable();
            $table->string("Review_id")->nullable();
            $table->string("Video_id")->nullable();
            $table->string("Categories_id")->nullable();
            $table->string("Brand_id")->nullable();
            $table->string("displaycategories_id")->nullable()->nullable();
            $table->string("typecategories_id")->nullable();
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
