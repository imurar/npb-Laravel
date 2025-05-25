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
        Schema::create('m_players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('unino');
            $table->string('team');
            $table->string('highscool');
            $table->string('university');
            $table->string('birthday');
            $table->string('prefecture');
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_players');
    }
};
