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
        Schema::create('music_categories', function (Blueprint $table) {
            $table->increments('music_category_id');

            $table->string('music_category');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('music_categories')->insert(
            array(
                ['music_category' => 'Rock'],
                ['music_category' => 'Jazz'],
                ['music_category' => 'Dance'],
                ['music_category' => 'Dubstep'],
                ['music_category' => 'Rhythm'],
                ['music_category' => 'Country'],
                ['music_category' => 'Pop'],
                ['music_category' => 'Indie Rock'],
                ['music_category' => 'Electro'],
                ['music_category' => 'Classic'],
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
