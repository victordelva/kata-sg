<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrialTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('/api/trials/KNV/NNV');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            "statusCode",
            "data" => [
                "status",
                "winner_id",
                "participants"
            ]
        ]);

        $response->assertJson([
            "statusCode"=> 200,
            "data" => [
                "status" => "OK",
                "winner_id"=> 1,
                "participants"=> [
                    "1"=> [
                        "contract"=> "KNV",
                        "points"=> 7
                    ],
                    "2"=> [
                        "contract"=> "NNV",
                        "points"=> 5
                    ]
                ]
            ]
        ]);
    }
}
