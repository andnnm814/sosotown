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
            $table->string('bankInfo1')->nullable(true)->change();
            $table->string('bankInfo2')->nullable(true)->change();
            $table->string('bankInfo3')->nullable(true)->change();
            $table->string('bankInfo4')->nullable(true)->change();
            $table->string('bankInfo5')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('bankInfo1')->nullable(false)->change();
            $table->string('bankInfo2')->nullable(false)->change();
            $table->string('bankInfo3')->nullable(false)->change();
            $table->string('bankInfo4')->nullable(false)->change();
            $table->string('bankInfo5')->nullable(false)->change();
        });
    }
};
