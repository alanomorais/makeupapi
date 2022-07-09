<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('code')->unique();
            $table->string('brand')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price',5,2)->nullable();
            $table->string('price_sign')->default('$')->nullable();
            $table->string('currency')->nullable();
            $table->text('image_link')->nullable();
            $table->text('product_link')->nullable();
            $table->text('website_link')->nullable();
            $table->text('description')->nullable();
            $table->string('rating')->nullable();
            $table->string('category')->nullable();
            $table->string('product_type')->nullable();
            $table->text('product_api_url')->nullable();
            $table->string('api_featured_image')->nullable();
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
};
