<?php

namespace Database\Factories;

use App\Models\Corporation;
use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class CorporationDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'corporation_id' => function () {
                return Corporation::factory()->create()->id;
            },
            'document_id' => function () {
                return Document::factory()->create()->id;
            },
            'file_url' => $this->faker->url,
        ];
    }
}
