<?php

namespace Database\Factories;

use App\Models\Information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{

    /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 3),
            'category_information_id' => mt_rand(1, 3),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'body' => collect($this->faker->paragraphs(mt_rand(3, 8)))->map(fn($p, $key) => "<p>$p</p>")->implode(''),
            'excerpt' => $this->faker->paragraph(),
            'priority' => mt_rand(1, 5),
            'letter' => $this->faker->url(),
        ];
    }
}
