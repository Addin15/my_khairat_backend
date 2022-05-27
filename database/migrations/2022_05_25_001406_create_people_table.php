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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('mosque_id')->nullable();
            $table->foreign('mosque_id')->references('id')->on('committees');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id')->references('id')->on('villages');
            $table->string('person_name')->nullable();
            $table->string('person_ic')->unique()->nullable();
            $table->string('person_phone')->nullable();
            $table->string('person_address')->nullable();
            $table->string('person_occupation')->nullable();
            $table->string('person_status')->nullable();
            $table->string('person_details_prove')->nullable();
            $table->string('person_register_date')->nullable();
            $table->string('person_payment_prove')->nullable();
            $table->integer('person_expire_month')->nullable();
            $table->integer('person_expire_year')->nullable();
            $table->integer('person_member_no')->nullable();
            $table->unsignedBigInteger('person_borner')->nullable();
            $table->foreign('person_borner')->references('user_id')->on('people');
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
        Schema::dropIfExists('people');
    }
};