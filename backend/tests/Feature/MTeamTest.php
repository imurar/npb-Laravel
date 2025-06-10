<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\MTeam;

class MTeamTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;
    
    /** @test */
    public function チームを一件登録できる()
    {
      $response = MTeam::create([
        'name' => 'テストチーム'
      ]);

      $this->assertDatabaseHas('m_teams',[
        'name' => 'テストチーム'
      ]);
    }

    /** @test */
    public function チーム一覧を取得できる()
    {
        MTeam::create(['name' => 'Aチーム']);
        MTeam::create(['name' => 'Bチーム']);

        $teams = MTeam::all();

        $this->assertCount(2, $teams);
        $this->assertEquals('Aチーム', $teams[0]->name);
    }

    /** @test */
    public function チーム作成APIにアクセスすると登録される()
    {
        $response = $this->get('/teams/create');

        $response->assertStatus(200);
        $this->assertDatabaseHas('m_teams', ['name' => '阪神タイガース']);
    }
}
