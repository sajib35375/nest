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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('welcome_title')->nullable();
            $table->longText('welcome_description')->nullable();
            $table->string('welcome_image')->nullable();
            $table->string('welcome_gallery')->nullable();
            $table->longText('provide')->nullable();
            $table->string('performance_title')->nullable();
            $table->longText('performance_description')->nullable();
            $table->string('performance_image_one')->nullable();
            $table->text('who_we_are_description')->nullable();
            $table->text('our_history_description')->nullable();
            $table->text('our_mission_description')->nullable();
            $table->string('glorious_years')->nullable();
            $table->string('happy_clients')->nullable();
            $table->string('projects_complate')->nullable();
            $table->string('team_advisor')->nullable();
            $table->string('products_sale')->nullable();
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
        Schema::dropIfExists('about_us');
    }
};
