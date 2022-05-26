<?php

namespace Database\Factories;

use App\Models\Corporation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorporationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Corporation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'business_name' => $this->faker->company,
            'logo' => $this->faker->imageUrl(200, 200),
            'db_name' => $this->faker->userName,
            'db_user' => $this->faker->userName,
            'db_password' => $this->faker->password,
            'system_url' => $this->faker->url,
            'status' => $this->faker->randomElement([true, false]),
            'registered_at' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'user_id' => function () {
                return User::find($this->faker->numberBetween(1, User::count()))->id;
            },
        ];
    }
}
