<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSettingsToIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->boolean('vegetarion')->default(1);
            $table->boolean('vegan')->default(1);
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->integer('state')->default(1)->after('updated_at');
            $table->boolean('private')->default(0)->after('state');
        });

        Schema::table('ingredient_recipe', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropColumn(['vegetarion', 'vegan']);
        });

        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('state');
        });

        Schema::table('ingredient_recipe', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
