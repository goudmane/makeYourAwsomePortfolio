<?php

use App\Models\User;
use App\Models\Portfolio;
use App\Models\PortfolioLang;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->portfolio = Portfolio::factory()->create([
        'user_id' => $this->user->id
    ]);
    $this->actingAs($this->user);
});

test('user can add language to portfolio', function () {
    $langData = [
        'language' => 'en',
        'content' => ['title' => 'English Title']
    ];

    $response = $this->postJson("/api/portfolios/{$this->portfolio->id}/languages", $langData);

    $response->assertStatus(201)
        ->assertJsonFragment($langData);

    $this->assertDatabaseHas('portfolio_langs', [
        'portfolio_id' => $this->portfolio->id,
        'language' => 'en'
    ]);
});

test('user can update portfolio language', function () {
    $lang = PortfolioLang::factory()->create([
        'portfolio_id' => $this->portfolio->id
    ]);

    $updateData = [
        'content' => ['title' => 'Updated Title']
    ];

    $response = $this->putJson("/api/portfolios/{$this->portfolio->id}/languages/{$lang->id}", $updateData);

    $response->assertStatus(200)
        ->assertJsonFragment($updateData);
});

test('user can delete portfolio language', function () {
    $lang = PortfolioLang::factory()->create([
        'portfolio_id' => $this->portfolio->id
    ]);

    $response = $this->deleteJson("/api/portfolios/{$this->portfolio->id}/languages/{$lang->id}");

    $response->assertStatus(204);
    $this->assertDatabaseMissing('portfolio_langs', ['id' => $lang->id]);
});
