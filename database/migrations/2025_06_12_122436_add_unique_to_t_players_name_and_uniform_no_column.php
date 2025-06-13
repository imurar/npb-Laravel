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
        Schema::table('t_players', function (Blueprint $table) {
            //
            $table->unique(['name', 'uniform_no'], 't_players_name_uniform_uique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_players', function (Blueprint $table) {
            //
            $table->dropUnique('t_players_name_uniform_unique');
        });
    }
};
