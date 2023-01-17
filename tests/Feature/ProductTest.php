<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A simple test to check product creation
     *
     * @return void
     */
    public function test_creating_product()
    {
        $response = $this->post('/products', [
            'name' => 'Oranges',
            'quantity' => 20,
            'price' => 35
        ]);
        $response->assertStatus(200);
    }
}
