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
            $table->bigIncrements('body_shape_id');

            $table->bigInteger('gender_id')->unsigned();
            $table->string('body_shape');
            $table->string('info', 512)->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('body_shapes')->insert(
            array(
                ['gender_id' => 1, 'body_shape' => 'Inverted triangle'],
                ['gender_id' => 1, 'body_shape' => 'Rectangle'],
                ['gender_id' => 1, 'body_shape' => 'Circle'],
                ['gender_id' => 1, 'body_shape' => 'Hourglass'],
                ['gender_id' => 1, 'body_shape' => 'Triangle'],
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
