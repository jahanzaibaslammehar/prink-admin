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
        Schema::create('genders', function (Blueprint $table) {
            $table->increments('gender_id');

            $table->string('gender');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('genders')->insert(
            array(
                ['gender' => 'Male'],
                ['gender' => 'Female'],
                ['gender' => 'Transgender'],
                ['gender' => 'Other'],
                ['gender' => 'Kid']
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
