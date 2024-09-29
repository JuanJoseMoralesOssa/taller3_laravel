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
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn('difficulty_level');
            $table->dropColumn('priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('todos', function (Blueprint $table) {
            $table->integer('priority')->default(0)->after('assigned_to');
            $table->float('difficulty_level')->default(0)->after('priority')->nullable();
        });
    }
};
