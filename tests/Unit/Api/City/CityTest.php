<?php

declare(strict_types=1);

namespace Tests\Unit\Api\City;

use App\Modules\City\Models\City;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CityTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     */
    public function it_should_return_all_cities()
    {
        $city1 = City::newFactory()->create([
            'name' => 'Aktau',
            'code' => 'SCO'
        ]);
        $city2 = City::newFactory()->create([
            'name' => 'Almaty',
            'code' => 'ALA'
        ]);

        $response = $this->getJson('/api/cities');

        $response->assertStatus(200);
        $response->assertExactJson([
            'message' => 'List of cities',
            'status' => 'success',
            'data' => [
                [
                    'name' => $city1->name,
                    'code' => $city1->code
                ],
                [
                    'name' => $city2->name,
                    'code' => $city2->code
                ]
            ]
        ]);
    }
}