<?php

use App\Models\User;
use App\Models\Portfolio;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

test('user can create portfolio', function () {
    $portfolioData = [
        'title' => 'My Portfolio',
        'description' => 'Portfolio Description'
    ];

    $response = $this->postJson('/api/portfolios', $portfolioData);

    $response->assertStatus(201)
        ->assertJsonFragment($portfolioData);

    $this->assertDatabaseHas('portfolios', [
        'user_id' => $this->user->id,
        'title' => 'My Portfolio'
    ]);
});

test('user can list their portfolios', function () {
    $portfolios = Portfolio::factory(3)->create([
        'user_id' => $this->user->id
    ]);

    $response = $this->getJson('/api/portfolios');

    $response->assertStatus(200)
        ->assertJsonCount(3, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'title', 'description']
            ]
        ]);
});

test('user can update their portfolio', function () {
    $portfolio = Portfolio::factory()->create([
        'user_id' => $this->user->id
    ]);

    $updateData = [
        'title' => 'Updated Portfolio',
        'description' => 'Updated Description'
    ];

    $response = $this->putJson("/api/portfolios/{$portfolio->id}", $updateData);

    $response->assertStatus(200)
        ->assertJsonFragment($updateData);
});

test('user can delete their portfolio', function () {
    $portfolio = Portfolio::factory()->create([
        'user_id' => $this->user->id
    ]);

    $response = $this->deleteJson("/api/portfolios/{$portfolio->id}");

    $response->assertStatus(204);
    $this->assertDatabaseMissing('portfolios', ['id' => $portfolio->id]);
});