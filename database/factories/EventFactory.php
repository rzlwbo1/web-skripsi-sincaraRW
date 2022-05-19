<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'priority' => mt_rand(0,5),
            'excerpt' => $this->faker->paragraph(),
            'body' => $this->faker->paragraph(3),
            'publish_at' =>$this->faker->date(),
            'time_at' => $this->faker->time()
        ];
    }
}
