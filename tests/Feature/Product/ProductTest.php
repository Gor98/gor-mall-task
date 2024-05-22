<?php

namespace Tests\Feature\Product;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Modules\Product\Models\Category;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_get_product_list(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function test_create_product_success(): void
    {
        $id = Category::insertGetId(['title' => fake()->name, 'description' => fake()->text]);


        $response = $this->postJson('/api/products', [
            'title' => fake()->name,
            'description' => fake()->text,
            'price' => fake()->randomDigitNotNull,
            'category_id' => $id,
            ]);
        $response->assertStatus(200);

        $response = json_decode($response->getContent(), true);
        $this->assertDatabaseHas('products', [
            'id' => $response['data']
        ]);
    }

    /**
     * Test addition with various inputs.
     *
     * @dataProvider additionDataProvider
     */
    public function test_create_product_error($data): void
    {
        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(422);
    }

    public static function additionDataProvider()
    {
        return [
            [[
                'title' => fake()->name,
                'description' => fake()->text,
                'price' => fake()->randomDigitNotNull,
            ]],
            [[
                'description' => fake()->text,
                'price' => fake()->randomDigitNotNull,
            ]],
            [[
                'title' => fake()->name,
                'description' => fake()->text,
                'price' => fake()->text,
                'category_id' => fake()->randomDigitNotNull,
            ]]
        ];
    }
}
