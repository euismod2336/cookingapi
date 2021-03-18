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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('amount_people')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('effort')->nullable();
            $table->string('time')->nullable();
            $table->text('instructions')->nullable();
            $table->enum('type', ['voor', 'hoofd', 'na', 'anders'])->default('hoofd');
            $table->integer('country_id')->nullable();
            $table->text('flavor_profile')->nullable();
            $table->softDeletes($column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
