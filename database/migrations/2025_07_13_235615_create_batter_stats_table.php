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
        Schema::create('batter_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->date('match_date');
            $table->string('opponent_team');
            $table->integer('at_bats')->default(0);
            $table->integer('hits')->default(0);
            $table->integer('home_runs')->default(0);
            $table->integer('rbi')->default(0);
            $table->integer('strikeouts')->default(0);
            $table->integer('walks')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batter_stats');
    }
};
