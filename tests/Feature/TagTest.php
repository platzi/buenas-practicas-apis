<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

use App\Models\Tag;
use App\Models\User;
use Laravel\Sanctum\Sanctum;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $tags = Tag::factory(2)->create();

        $response = $this->getJson('/api/tags');
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'type',
                        'attributes' => ['name'],
                        'relationships' => [
                            'recipes' => []
                        ],
                    ]
                ]
            ]);
    }

    public function test_show(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $tag = Tag::factory()->create();

        $response = $this->getJson('/api/tags/' . $tag->id);
        $response->assertStatus(Response::HTTP_OK) // 200
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'type',
                    'attributes' => ['name'],
                    'relationships' => [
                        'recipes' => []
                    ],
                ]
            ]);
    }
}
