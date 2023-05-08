<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Categoryクラスの名前空間をインポート
use \App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(["name" => "レディース"]);
        Category::create(["name" => "メンズ"]);
        Category::create(["name" => "キッズ"]);
    }
}
