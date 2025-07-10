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
        Schema::create('pitcher_stats', function (Blueprint $table) {
            $table->id();
			$table->foreignId('player_id')->constrained()->onDelete('cascade');
		    $table->date('match_date');
		    $table->string('opponent_team');
		    $table->float('innings_pitched');
			$table->integer('hits_allowed');
		    $table->integer('strikeouts');
		    $table->integer('walks');
		    $table->integer('earned_runs');
			$table->boolean('win')->default(false);
		    $table->boolean('save')->default(false);
		    $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pitcher_stats');
    }
};
