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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('claim_id');
            $table->foreign('claim_id')->references('id')->on('users');
            $table->unsignedBigInteger('mosque_id');
            $table->foreign('mosque_id')->references('id')->on('committees');
            $table->String('claimer_name');
            $table->String('claimer_address');
            $table->String('claimer_ic');
            $table->String('claimer_relation');
            $table->string('dead_date');
            $table->String('dead_name');
            $table->String('dead_reason');
            $table->String('claimer_url');
            $table->String('status');
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
        Schema::dropIfExists('claims');
    }
};