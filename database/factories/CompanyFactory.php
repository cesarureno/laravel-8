<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Corporate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'business_name' => $this->faker->company,
            'rfc' => $this->faker->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'),
            'country' => $this->faker->country,
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'neighborhood' => $this->faker->city,
            'address' => $this->faker->streetAddress,
            'postal_code' => $this->faker->postcode,
            'cfdi' => $this->randomElement(['G01', 'G02', 'G03']),
            'rfc_url' => $this->faker->imageUrl(300, 300, 'rfc'),
            'acta_url' => $this->faker->imageUrl(300, 300, 'acta'),
            'status' => $this->faker->boolean,
            'comments' => $this->faker->text,
            'corporate_id' => function () {
                return Corporate::find($this->faker->numberBetween(1, Corporate::count()))->id;
            },
        ];
    }
}
