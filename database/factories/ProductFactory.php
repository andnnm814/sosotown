<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $now = Carbon::now();
        return [
            'category_id' => $this->faker->numberBetween(1,3),
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(500,99999),
            'comment' => $this->faker->sentences(),
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
