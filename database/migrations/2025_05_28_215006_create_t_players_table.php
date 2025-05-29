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
        Schema::create('t_players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('position_id')->constrained('m_positions')->onDelete('cascade');
            $table->string('uniform_no');
            $table->foreignId('team_id')->constrained('m_teams')->onDelete('cascade');
            $table->string('highschool')->nullable();
            $table->string('university')->nullable();
            $table->string('company')->nullable();
            $table->string('birthday')->nullable();
            $table->foreignId('prefecture_id')->nullable()->constrained('m_prefectures')->onDelete('cascade');
            $table->foreignId('city_id')->nullable()->constrained('m_citys')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_players');
    }
};