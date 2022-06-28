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
        Schema::create('committee_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('committee_id');
            $table->foreign('committee_id')->references('id')->on('committees');
            $table->string('remark');
            $table->string('prove_url');
            $table->boolean('is_done');
            $table->boolean('is_rejected');
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
        Schema::dropIfExists('committee_payments');
    }
};