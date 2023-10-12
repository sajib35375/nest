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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('footer_title')->nullable();
            $table->string('footer_address')->nullable();
            $table->string('footer_phone_no')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('footer_copyright_text')->nullable();
            $table->string('working_teliphone')->nullable();
            $table->string('support_teliphone')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('follow_us_title')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('alexa_analytics')->nullable();
            $table->text('google_verification')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_image_link')->nullable();
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
        Schema::dropIfExists('seos');
    }
};
