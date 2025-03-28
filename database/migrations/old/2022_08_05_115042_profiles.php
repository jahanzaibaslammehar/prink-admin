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
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('profile_id');
            $table->bigInteger('user_id');

            $table->string('first_name');
            $table->string('last_name');

            $table->date('dob');
            $table->bigInteger('location_id');
            $table->bigInteger('gender_id');
            $table->bigInteger('body_shape_id');

            $table->string('photo')->nullable();

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
