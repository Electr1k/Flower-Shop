<?php

namespace Flower;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Flower;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlowerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_flowers_returns_a_successful_response(): void
    {
        $flowers = Flower::factory(10)->create();
        $response = $this->get('/api/flowers/all');
        $response->assertOk();
        $json = $flowers->map(function ($flower){
            return [
                'id' => $flower->id,
                'title' => $flower->title,
                'description' => $flower->description,
                'price' => $flower->price,
            ];
        })->toArray();
        $response->assertJson(['data'=>$json]);
    }

    /** @test */
    public function get_flower_by_id_returns_a_successful_response(): void
    {
        $this->withoutExceptionHandling();
        $flower = Flower::factory()->create();
        $response = $this->get('/api/flowers/' . $flower->id);
        $response->assertOk();

        $response->assertJson(['data' =>[
            'id' => $flower->id,
            'title' => $flower->title,
            'description' => $flower->description,
            'price' => $flower->price,
        ]]);
    }

    /** @test */
    public function create_flower_returns_a_successful_response(): void
    {
        $this->withoutExceptionHandling();
        $data = [
            'title' => 'New flower',
            'description' => 'desc',
            'count' => 3,
            'price' => 5
        ];
        $response = $this->post('/api/flowers', $data);

        $response->assertStatus(401);
    }
}
