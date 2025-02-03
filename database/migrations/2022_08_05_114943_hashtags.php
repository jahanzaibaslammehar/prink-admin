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
        Schema::create('hashtags', function (Blueprint $table) {
            $table->increments('hashtag_id');

            $table->string('hashtag');
            $table->bigInteger('count')->default(0);

            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('hashtags')->insert(
            array(
                ['hashtag' => '#cloths', 'count' => 0],
                ['hashtag' => '#fashion', 'count' => 0],
                ['hashtag' => '#prink', 'count' => 0],
                ['hashtag' => '#brand', 'count' => 0],
                ['hashtag' => '#follow_me', 'count' => 0],
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
