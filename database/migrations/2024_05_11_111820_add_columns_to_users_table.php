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
        Schema::table('users', function (Blueprint $table) {
            $table->after('name', function (Blueprint $table) {
                $table->string('username')->unique();
            });
            
            $table->string('password')->nullable()->change();

            $table->after('password', function (Blueprint $table) {
                $table->string('github_id')->unique();
                $table->boolean('is_admin');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');

            $table->string('password')->change();

            $table->dropColumn('github_id');
            $table->dropColumn('is_admin');
        });
    }
};
