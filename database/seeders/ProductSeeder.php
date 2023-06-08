<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "category_id" => 1,
            "name" => "デニム",
            "price" => 4000,
            "comment" => "オーバーサイズのトレーナーやパーカー、Tシャツと合わせ、ダボっとしたスケータースタイルはもちろん
                ニットやブラウス、シャツジャケットと合わせ、ハイウエストを活かしたきれいめスタイルにももってこい。
                合わせるアイテムに自然と溶け込むシンプルなデザインなので、自由にコーデを楽しめます。",
            "img1_path" => "CUsqvvsstv58H35cGxAzC0UA34rUW7jrmcpMRiqY.jpg",
            "img2_path" => "lucas-lenzi-i227dPHaQ7s-unsplash.jpg",
            "img3_path" => "tamara-bellis-zDyJOj8ZXG0-unsplash.jpg",
        ]);
        Product::create([
            "category_id" => 2,
            "name" => "カラーニットプルオーバー",
            "price" => 13600,
            "comment" => "綿ポリ素材の糸を度違い天竺という編み方で編んだニットを製品染めしたプルオーバーニット。
                ややゆとりのあるレギュラーシルエット。
                製品染め加工による独特なフェード感のある表情がポイント。
                襟ぐりは編み組織を変えて柄のような見え方にしてアクセントに。",
            "img1_path" => "ALye58Q4fl3Vz3iEi4MfSBlJX8wGHzfS8NFIz9V3.jpg",
        ]);
        Product::create([
            "category_id" => 2,
            "name" => "ベーシックT",
            "price" => 1960,
            "comment" => "上質な天然素材を100％採用し、適度に肉感のある生地に仕上げる事で
            色の発色も良く、トレンドの淡色・くすみカラーと相性抜群。
            ⁡コットン素材なので通気性・吸水性共に優れており、
            厚手ながらも比較的蒸れることなく快適にご着用いただけます◎⁡",
            "img1_path" => "AsoWx2Ihton1BzdhvXendJWLfyARnfpOx9Y4iLPW.jpg",
        ]);
        Product::create([
            "category_id" => 3,
            "name" => "スポーツウェア セット",
            "price" => 4200,
            "comment" => "遊びにも散歩にも最適。抜群に快適な柔らかいフリース素材を使用しています。",
            "img1_path" => "Lh3hRLddSGcl4KMcpM4Xt5tIAsDRqgAc1UgjNQ9h.jpg",
            "img2_path" => "UE4cuzhDqfEyn6s4cfNHHRBlsZQeTEivF0MDRdUm.jpg",
            "img3_path" => "UrMdperVGQjFpdsFehc75Wwk9xkZTf7NJaLG6rt0.jpg",
        ]);

        for($i = 1; $i <= 100; $i++) {
            Product::create([
                "category_id" => rand(1,3),
                "name" => "サンプル".$i,
                "price" => rand(10, 100) * 100,
                "comment" => "サンプルサンプルサンプルサンプル",
                "img1_path" => "G800dZ7eGzN4E4t0aefOpllSfc2vFS6AvYXmHB2E.jpg",
                "img2_path" => "G800dZ7eGzN4E4t0aefOpllSfc2vFS6AvYXmHB2E.jpg",
                "img3_path" => "G800dZ7eGzN4E4t0aefOpllSfc2vFS6AvYXmHB2E.jpg",
                "img4_path" => "G800dZ7eGzN4E4t0aefOpllSfc2vFS6AvYXmHB2E.jpg",
            ]);
        }
    }
}
