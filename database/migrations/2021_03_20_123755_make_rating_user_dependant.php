<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeRatingUserDependant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('user_id');

            $table->foreignId('owner_id')
                ->after('id')
                ->constrained('users')
                ->onDelete('cascade');
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
        Schema::table('recipes', function (Blueprint $table) {
            $table->integer('rating')->nullable()->after('amount_people');
            $table->integer('user_id')->nullable()->after('id');

            $table->dropColumn('owner_id');
        });

        Schema::table('recipe_user', function (Blueprint $table) {
            $table->drop();
        });
    }
}
