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
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('dependents');
            $table->unsignedBigInteger('dependent_id')->nullable();
            $table->foreign('dependent_id')->references('id')->on('dependents');
            $table->string('dependent_name')->nullable();
            $table->string('dependent_ic')->nullable();
            $table->string('dependent_relation')->nullable();
            $table->string('dependent_phonenum')->nullable();
            $table->string('dependent_address')->nullable();
            $table->string('dependent_deathdate')->nullable();
            $table->string('death_location')->nullable();
            $table->string('death_causes')->nullable();
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
        Schema::dropIfExists('deaths');
    }
};
