<?php

namespace Database\Factories;

use App\Models\Corporation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->jobTitle,
            'comments' => $this->faker->text,
            'phone_number' => substr($this->faker->phoneNumber, 0, 12),
            'mobile_phone_number' => substr($this->faker->phoneNumber, 0, 12),
            'email' => $this->faker->email,
            'corporation_id' => function () {
                return Corporation::factory()->create()->id;
            },
        ];
    }
}
