<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relationships extends Migration
{
    public function up()
    {
        Schema::table('abuse_reports', function (Blueprint $table) {
            $table->foreign('report_by')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
        });

        Schema::table('favorite_music', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('music_id')->references('music_id')->on('music')->onDelete('cascade');
        });

        Schema::table('favorite_videos', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
        });

        Schema::table('followers', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('follower_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('followings', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('following_user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
        });

        Schema::table('music', function (Blueprint $table) {
            $table->foreign('upload_by')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('music_category_id')->references('music_category_id')->on('music_categories')->onDelete('restrict');
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('sender_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('set null');
            $table->foreign('nationality')->references('location_id')->on('locations')->onDelete('set null');
            $table->foreign('gender_id')->references('gender_id')->on('genders')->onDelete('set null');
            $table->foreign('body_shape_id')->references('body_shape_id')->on('body_shapes')->onDelete('set null');
        });

        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        Schema::table('unlikes', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->foreign('upload_by')->references('user_id')->on('users')->onDelete('cascade');

            $table->foreign('gender_id')->references('gender_id')->on('genders')->onDelete('restrict');
            $table->foreign('body_shape_id')->references('body_shape_id')->on('body_shapes')->onDelete('restrict');
            $table->foreign('color_id')->references('color_id')->on('colors')->onDelete('restrict');
            $table->foreign('outfit_type_id')->references('outfit_type_id')->on('outfit_types')->onDelete('restrict');
            $table->foreign('video_category_id')->references('video_category_id')->on('video_categories')->onDelete('restrict');
            
            $table->foreign('music_id')->references('music_id')->on('music')->onDelete('set null');
        });

        Schema::table('views', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('video_id')->on('videos')->onDelete('cascade');
        });

        Schema::table('body_shapes', function (Blueprint $table) {
            $table->foreign('gender_id')->references('gender_id')->on('genders')->onDelete('cascade');
        });
    }

    public function down()
    {
        //
    }
}
