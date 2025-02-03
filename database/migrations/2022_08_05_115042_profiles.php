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
            $table->bigIncrements('profile_id');
            $table->bigInteger('user_id')->unsigned();

            $table->string('first_name');
            $table->string('last_name')->nullable();

            $table->date('dob')->nullable();
            $table->bigInteger('location_id')->nullable()->unsigned();
            $table->bigInteger('nationality')->nullable()->unsigned();
            $table->bigInteger('gender_id')->nullable()->unsigned();
            $table->bigInteger('body_shape_id')->nullable()->unsigned();
            $table->string('bio', 512)->nullable();

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
