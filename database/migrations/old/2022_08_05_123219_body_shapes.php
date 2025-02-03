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
        Schema::create('body_shapes', function (Blueprint $table) {
            $table->increments('body_shape_id');

            $table->string('body_shape');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('body_shapes')->insert(
            array(
                ['body_shape' => 'Inverted triangle'],
                ['body_shape' => 'Rectangle'],
                ['body_shape' => 'Circle'],
                ['body_shape' => 'Hourglass'],
                ['body_shape' => 'Triangle'],
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
