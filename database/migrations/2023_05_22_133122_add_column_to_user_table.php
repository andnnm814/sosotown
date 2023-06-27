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
            $table->string('post_code');
            $table->string('adress');
            $table->string('financial_institution');
            $table->string('branch_name');
            $table->string('account_type');
            $table->string('account_number');
            $table->string('nominee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('post_code');
            $table->dropColumn('adress');
            $table->dropColumn('financial_institution');
            $table->dropColumn('branch_name');
            $table->dropColumn('account_type');
            $table->dropColumn('account_number');
            $table->dropColumn('nominee');
        });
    }
};
