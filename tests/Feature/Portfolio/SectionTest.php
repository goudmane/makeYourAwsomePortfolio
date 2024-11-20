<?php

use App\Models\User;
use App\Models\Portfolio;
use App\Models\PortfolioLang;
use App\Models\Section;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->portfolio = Portfolio::factory()->create([
        'user_id' => $this->user->id
    ]);
    $this->portfolioLang = PortfolioLang::factory()->create([
        'portfolio_id' => $this->portfolio->id
    ]);
    $this->actingAs($this->user);
});

test('user can create section', function () {
    $sectionData = [
        'title' => 'About Me',
        'body' => 'Section content here'
    ];

    $response = $this->postJson("/api/languages/{$this->portfolioLang->id}/sections", $sectionData);

    $response->assertStatus(201)
        ->assertJsonFragment($sectionData);

    $this->assertDatabaseHas('sections', [
        'portfolio_lang_id' => $this->portfolioLang->id,
        'title' => 'About Me'
    ]);
});

test('user can update section', function () {
    $section = Section::factory()->create([
        'portfolio_lang_id' => $this->portfolioLang->id
    ]);

    $updateData = [
        'title' => 'Updated Section',
        'body' => 'Updated content'
    ];

    $response = $this->putJson("/api/languages/{$this->portfolioLang->id}/sections/{$section->id}", $updateData);

    $response->assertStatus(200)
        ->assertJsonFragment($updateData);
});

test('user can delete section', function () {
    $section = Section::factory()->create([
        'portfolio_lang_id' => $this->portfolioLang->id
    ]);

    $response = $this->deleteJson("/api/languages/{$this->portfolioLang->id}/sections/{$section->id}");

    $response->assertStatus(204);
    $this->assertDatabaseMissing('sections', ['id' => $section->id]);
});