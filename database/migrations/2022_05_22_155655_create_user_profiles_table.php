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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('mosque_id');
            $table->foreign('mosque_id')->references('id')->on('committees');
            $table->unsignedBigInteger('village_id');
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('user_name')->nullable();
            $table->string('user_ic')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_occupation')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
};