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
        //
        Schema::table('m_players', function (Blueprint $table) {
            $table->string('highschool')->nullable()->change();
            $table->string('university')->nullable()->change();
            $table->string('birthday')->nullable()->change();
            $table->string('prefecture')->nullable()->change();
            $table->string('city')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('m_players', function (Blueprint $table) {
            $table->string('highschool')->nullable(false)->change();
            $table->string('university')->nullable(false)->change();
            $table->string('birthday')->nullable(false)->change();
            $table->string('prefecture')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
        });
    }
};