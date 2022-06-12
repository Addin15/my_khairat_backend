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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('dependent_name')->nullable();
            $table->string('dependent_relation')->nullable();
            $table->string('dependent_ic')->unique()->nullable();
            $table->string('dependent_phone')->nullable();
            $table->string('dependent_occupation')->nullable();
            $table->string('dependent_address')->nullable();
            $table->string('death_status')->nullable();
            $table->string('death_date')->nullable();
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
        Schema::dropIfExists('dependents');
    }
};
