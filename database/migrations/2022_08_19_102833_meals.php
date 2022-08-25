<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Meals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rid'); //restaurant id
            $table->string('name');
            $table->integer('price')        ->default(0);
            $table->integer('protien')      ->default(0);
            $table->integer('sugar')        ->default(0);
            $table->integer('calories')     ->default(0);
            $table->integer('fat')          ->default(0);
            $table->integer('carbs')        ->default(0);
            $table->integer('saturated_fat')->default(0);
            $table->integer('na')           ->default(0);
            $table->integer('P')            ->default(0);
            $table->integer('K')            ->default(0);
            $table->integer('status')       ->default(0);
            $table->string('tag_style')                 ->nullable();
            $table->string('tag_health')                ->nullable();
            $table->string('ingredient')                ->nullable();
            $table->integer('ord')          ->default(1);
            $table->integer('del')          ->default(0);
            $table->integer('auth')         ->default(0);
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
        Schema::dropIfExists('meals');
    }
}
