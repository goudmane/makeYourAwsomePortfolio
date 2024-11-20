<?php

namespace Database\Factories;

use App\Models\PortfolioLang;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition(): array
    {
        return [
            'portfolio_lang_id' => PortfolioLang::factory(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true)
        ];
    }
}