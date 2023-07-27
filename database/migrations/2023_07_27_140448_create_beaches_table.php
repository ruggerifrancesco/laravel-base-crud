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
        Schema::create('beaches', function (Blueprint $table) {
            $table->id();
            $table->name();
            $table->city();
            $table->n_umbrellas();
            $table->n_seats();
            $table->umbrellas_day_price();
            $table->opening_date();
            $table->closing_date();
            $table->has_volley();
            $table->has_football();
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
        Schema::dropIfExists('beaches');
    }
};
