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
        Schema::create('outfit_types', function (Blueprint $table) {
            $table->increments('outfit_type_id');

            $table->string('outfit_type');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('outfit_types')->insert(
            array(
                ['outfit_type' => 'Streetwear'],
                ['outfit_type' => 'Ethnic'],
                ['outfit_type' => 'Formal'],
                ['outfit_type' => 'Business'],
                ['outfit_type' => 'Glamorous'],
                ['outfit_type' => 'Sports'],
                ['outfit_type' => 'Girly'],
                ['outfit_type' => 'Androgynous'],
                ['outfit_type' => 'Scene'],
                ['outfit_type' => 'Rocker'],
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
