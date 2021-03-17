<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utensils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->string('location_geo')->nullable();
            $table->softDeletes($column = 'deleted_at');
        });

        Schema::create('recipe_utensil', static function (Blueprint $table) {
            $table->id();
            $table->string('recipe_id');
            $table->string('utensil_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utensils');
        Schema::dropIfExists('recipe_utensil');
    }
}
