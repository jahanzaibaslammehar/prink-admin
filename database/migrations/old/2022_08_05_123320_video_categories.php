<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_categories', function (Blueprint $table) {
            $table->increments('video_category_id');

            $table->string('video_category');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('video_categories')->insert(
            array(
                ['video_category' => 'Promo'],
                ['video_category' => 'Teaser'],
                ['video_category' => 'Announcement'],
                ['video_category' => 'Behind-the-scenes'],
                ['video_category' => 'Shoppable'],
                ['video_category' => 'Social video'],
                ['video_category' => 'Infotainment'],
                ['video_category' => 'A story'],
                ['video_category' => 'How to content'],
                ['video_category' => 'Thank you'],
            )
        );
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
