<?php

namespace Database\Factories;

use App\Models\Portfolio;
use App\Models\PortfolioLang;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioLangFactory extends Factory
{
    protected $model = PortfolioLang::class;

    public function definition(): array
    {
        return [
            'portfolio_id' => Portfolio::factory(),
            'language' => $this->faker->randomElement(['en', 'es', 'fr']),
            'content' => [
                'title' => $this->faker->sentence(),
                'description' => $this->faker->paragraph()
            ]
        ];
    }
}