<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Flower;
use Illuminate\Database\Eloquent\Factories\Factory;


class FlowerFactory extends Factory
{

    protected $model = Flower::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if (!Category::count()){
            Category::factory(10)->create();
        }
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'price' => random_int(1, 20000),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
