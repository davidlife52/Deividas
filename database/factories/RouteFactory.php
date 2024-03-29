<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\Bus;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Route::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bus_id' => Bus::factory(),
            'from' => $this->faker->city(),
            'to' => $this->faker->city(),
            'leaveAt' => $this->faker->dateTime(),
            'arriveAt' => $this->faker->dateTime(),
            'price' => $this->faker->randomDigit(),
            'seats' => $this->faker->randomNumber(),
        ];
    }
}
