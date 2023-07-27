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
            $table->string('name', 60);
            $table->string('city', 100);
            $table->integer('n_umbrellas')->unsigned();
            $table->integer('n_seats')->unsigned();
            $table->float('umbrellas_day_price')->unsigned();
            $table->date('opening_date');
            $table->date('closing_date');
            $table->boolean('has_volley')->default(false);
            $table->boolean('has_football')->default(false);
            $table->text('description')->nullable();
            $table->softDeletes();
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
