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
            $table->boolean('is_favorite')->default(false)->after('city_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_players', function (Blueprint $table) {
            //
            $table->dropColumn('is_favorite');
            $table->dropSoftDeletes();
        });
    }
};
