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
        Schema::create('committee_profiles', function (Blueprint $table) {
            $table->id('mosque_id');
            $table->foreign('mosque_id')->references('id')->on('committees');
            $table->string('mosque_name')->nullable();
            $table->string('mosque_phone')->nullable();
            $table->string('mosque_postcode')->nullable();
            $table->string('mosque_state')->nullable();
            $table->string('mosque_address')->nullable();
            $table->string('mosque_registration_prove')->nullable();
            $table->string('mosque_bank_name')->nullable();
            $table->string('mosque_bank_owner_name')->nullable();
            $table->string('mosque_bank_no')->nullable();
            $table->double('mosque_monthly_fee')->nullable();
            $table->string('mosque_status')->nullable();
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
        Schema::dropIfExists('committee_profiles');
    }
};