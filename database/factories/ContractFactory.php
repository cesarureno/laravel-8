<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Corporation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'started_at' => $this->faker->dateTimeBetween('-2 year', 'now'),
            'ended_at' => $this->faker->dateTimeBetween('-2 year', 'now'),
            'url' => $this->faker->url,
            'corporation_id' => function () {
                return Corporation::factory()->create()->id;
            },
        ];
    }
}
