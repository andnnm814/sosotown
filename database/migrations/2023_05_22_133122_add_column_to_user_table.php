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
            $table->string('postcode');
            $table->string('adress');
            $table->string('bankInfo1');
            $table->string('bankInfo2');
            $table->string('bankInfo3');
            $table->string('bankInfo4');
            $table->string('bankInfo5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('postcode');
            $table->dropColumn('adress');
            $table->dropColumn('bankInfo1');
            $table->dropColumn('bankInfo2');
            $table->dropColumn('bankInfo3');
            $table->dropColumn('bankInfo4');
            $table->dropColumn('bankInfo5');
        });
    }
};
