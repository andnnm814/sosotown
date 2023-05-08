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
        Schema::table('products', function (Blueprint $table) {
            $table->text("img1_path")->nullable(true)->change();
            $table->text("img2_path")->nullable(true)->change();
            $table->text("img3_path")->nullable(true)->change();
            $table->text("img4_path")->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text("img1_path")->nullable(false)->change();
            $table->text("img2_path")->nullable(false)->change();
            $table->text("img3_path")->nullable(false)->change();
            $table->text("img4_path")->nullable(false)->change();
        });
    }
};
