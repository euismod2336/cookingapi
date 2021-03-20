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
            $table->foreignId('owner_id')
                ->after('id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('amount_people')->nullable();
            $table->integer('effort')->nullable();
            $table->string('time')->nullable();
            $table->text('instructions')->nullable();
            $table->enum('type', ['voor', 'hoofd', 'na', 'anders'])->default('hoofd');
            $table->integer('country_id')->nullable();
            $table->text('flavor_profile')->nullable();
            $table->integer('state')->default(1);
            $table->boolean('private')->default(0);
            $table->softDeletes($column = 'deleted_at');
        });

        Schema::create('recipe_user', function (Blueprint $table) {
            $table->foreignId('recipe_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('rating')->nullable();
            $table->boolean('favorite')->default(0);
            $table->text('description')->nullable();
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
        Schema::dropIfExists('recipes');
    }
}
