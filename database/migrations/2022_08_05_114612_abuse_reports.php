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
        Schema::create('abuse_reports', function (Blueprint $table) {
            $table->increments('abuse_report_id');

            $table->enum('report_type', ['video', 'user']);
            $table->bigInteger('report_by');
            $table->bigInteger('report_for');
            $table->text('reason');

            $table->string('action')->nullable();
            $table->bigInteger('taken_by')->nullable();
            $table->dateTime('action_timestamp')->nullable();
            $table->enum('status', ['Pending', 'Resolved', 'Not Resolved']);

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
