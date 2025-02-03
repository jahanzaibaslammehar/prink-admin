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
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('video_id');

            $table->bigInteger('gender_id');
            $table->bigInteger('body_shape_id');
            $table->bigInteger('color_id');
            $table->bigInteger('outfit_type_id');
            $table->bigInteger('video_category_id');

            $table->string('video_url');
            $table->string('hashtags');
            
            $table->enum('music_type', ['custom', 'orignal']);
            $table->bigInteger('music_id')->nullable();

            $table->bigInteger('upload_by');
            
            $table->boolean('is_private')->default(1);
            $table->boolean('is_disabled')->default(0);
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
        //
    }
};
