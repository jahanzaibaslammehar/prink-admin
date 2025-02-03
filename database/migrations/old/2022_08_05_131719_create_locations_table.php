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
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('location_id');

            $table->string('location');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        DB::table('locations')->insert(
            array(
                ['location' => 'Iran'],
                ['location' => 'Pakistan'],
                ['location' => 'Saudi Arab'],
                ['location' => 'Turkey'],
                ['location' => 'United Arab Emirates'],
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
        Schema::dropIfExists('locations');
    }
};
