<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            
            $table->string('mobile')->unique();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('otp')->nullable();

            $table->string('facebook')->unique()->nullable();
            $table->string('google')->unique()->nullable();
            $table->string('instagram')->unique()->nullable();

            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_private')->default(0);
            $table->boolean('is_admin')->default(0);
            
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
