<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            
            $table->string('made')->nullable(false);

            $table->integer('price')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('img')->nullable(false);
            $table->string('desc')->nullable(false);
            $table->integer('star_rating')->nullable();
            $table->longText('comments')->nullable();

            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');


            $table->integer('category_model_id')->unsigned();
            $table->foreign('category_model_id')->references('id')->on('category_model')->onDelete('cascade')->onUpdate('cascade');


            $table->integer('category_brand_id')->unsigned();
            $table->foreign('category_brand_id')->references('id')->on('category_brand')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('merchant_id')->unsigned();
            $table->foreign('merchant_id')->references('id')->on('merchant')->onDelete('cascade')->onUpdate('cascade');

            $table->softDeletes();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
