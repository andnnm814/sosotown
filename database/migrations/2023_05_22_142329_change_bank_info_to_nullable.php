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
            $table->string('financial_institution')->nullable(true)->change();
            $table->string('branch_name')->nullable(true)->change();
            $table->string('account_type')->nullable(true)->change();
            $table->string('account_number')->nullable(true)->change();
            $table->string('nominee')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('financial_institution')->nullable(false)->change();
            $table->string('branch_name')->nullable(false)->change();
            $table->string('account_type')->nullable(false)->change();
            $table->string('account_number')->nullable(false)->change();
            $table->string('nominee')->nullable(false)->change();
        });
    }
};
