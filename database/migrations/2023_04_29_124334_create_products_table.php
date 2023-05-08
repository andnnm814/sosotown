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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("category_id")->unsigned();
            $table->string("name");
            $table->integer("price");
            $table->text("comment");
            $table->text("img1_path");
            $table->text("img2_path");
            $table->text("img3_path");
            $table->text("img4_path");
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
