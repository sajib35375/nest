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
        Schema::create('contact_page_infos', function (Blueprint $table) {
            $table->id();
            $table->string('main_title')->nullable();
            $table->text('main_description')->nullable();
            $table->string('sub_title_one')->nullable();
            $table->text('sub_description_one')->nullable();
            $table->string('sub_title_two')->nullable();
            $table->text('sub_description_two')->nullable();
            $table->string('sub_title_three')->nullable();
            $table->text('sub_description_three')->nullable();
            $table->string('sub_title_four')->nullable();
            $table->text('sub_description_four')->nullable();
            $table->text('embded_googlemap_link')->nullable();
            $table->text('office_address')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_email')->nullable();
            $table->text('office_googlemap_url')->nullable();
            $table->text('studio_address')->nullable();
            $table->string('studio_phone')->nullable();
            $table->string('studio_email')->nullable();
            $table->text('studio_googlemap_url')->nullable();
            $table->text('shop_address')->nullable();
            $table->string('shop_phone')->nullable();
            $table->string('shop_email')->nullable();
            $table->text('shop_googlemap_url')->nullable();
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
        Schema::dropIfExists('contact_page_infos');
    }
};
