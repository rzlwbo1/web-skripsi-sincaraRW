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
            'category_event_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 3),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'priority' => mt_rand(1, 5),
            'excerpt' => $this->faker->paragraph(),
            // di map biar bisa di sisipin tag p
            'body' => collect($this->faker->paragraphs(mt_rand(3, 8)))->map(fn($p, $key) => "<p>$p</p>")->implode(''),
            'location' => $this->faker->countryCode(),
            'date_at' =>$this->faker->date(),
            'time_at' => $this->faker->time()
        ];
    }
}
