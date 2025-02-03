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
        Schema::create('colors', function (Blueprint $table) {
            $table->increments('color_id');

            $table->string('color_name');
            $table->string('color_code');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('colors')->insert(
            array(
                ['color_name' => 'White', 'color_code' => '#FFFFFF'],
                ['color_name' => 'Black', 'color_code' => '#000000'],
                ['color_name' => 'Silver', 'color_code' => '#DDDDDD'],
                ['color_name' => 'Red', 'color_code' => '#FF0000'],
                ['color_name' => 'Blue', 'color_code' => '#00FFFF'],
                ['color_name' => 'Yellow', 'color_code' => '#FFFF00'],
                ['color_name' => 'Gray', 'color_code' => '#888888'],
                ['color_name' => 'Pink', 'color_code' => '#FF00FF'],
                ['color_name' => 'Purple', 'color_code' => '#8000FF'],
                ['color_name' => 'Green', 'color_code' => '#00FF00'],
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
