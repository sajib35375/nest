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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->string('product_name');
            $table->string('brand_name')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('regular_price')->nullable();
            $table->string('type')->nullable();
            $table->string('MFG')->nullable();
            $table->string('LIFE')->nullable();
            $table->string('SKU')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('hover_img')->nullable();
            $table->string('deals_time')->nullable();
            $table->text('short_des');
            $table->longText('long_des');
            $table->integer('top_selling')->nullable();
            $table->integer('trending_product')->nullable();
            $table->integer('Recently_added')->nullable();
            $table->integer('top_rateded')->nullable();
            $table->integer('deals_day')->nullable();
            $table->string('deals_date')->nullable();
            $table->string('deals_time')->nullable();
            $table->string('rating_status')->nullable();
            $table->date('deals_date')->nullable();
            $table->integer('rating_status')->nullable();
            $table->boolean('status')->default(true);
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
