<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    //メソッド名は「test」で始める
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testTopPage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('阪神タイガース');
        $response->assertSee('佐藤 輝明');
    }

    public function testSato()
    {
        $response = $this->get('/sato8');
        $response->assertStatus(200);
        $response->assertSee('佐藤 輝明');
        $response->assertSee('兵庫県西宮市');
        $response->assertSee('仁川高校');
    }
}
