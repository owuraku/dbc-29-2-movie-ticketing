<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('showings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('showing_datetime');
            $table->unsignedBigInteger('movie_id');
            $table->double('price')->default(0);
            $table->string('room')->nullable(true);
            $table->integer('limit')->default(50);

            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showings');
    }
};
