<?php

declare(strict_types=1);

namespace Tests\Unit\Api\Auth;

use App\Models\User;
use App\Modules\City\Models\City;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

final class AuthTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     */
    public function it_register_user()
    {
        // Arrange
        $city = City::newFactory()->create([
            'name' => 'New York',
            'code' => 'NY',
        ]);

        // Act
        $response = $this->post('api/auth/register', [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@mail.com',
            'city_id' => $city->id,
            'password' => 'password',
        ]);

        // Assert
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'message',
            'status',
            'data' => [
                'token',
                'token_type',
                'expires_in',
                'user' => [
                    'id',
                    'firstname',
                    'lastname',
                    'email',
                    'city',
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function it_login_user()
    {
        // Arrange
        $user = User::factory()->create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'johndoe@mail.com',
            'password' => bcrypt('password'),
        ]);

        // Act
        $response = $this->post('api/auth/login', [
            'email' => 'johndoe@mail.com',
            'password' => 'password',
        ]);

        // Assert
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'status',
            'data' => [
                'token',
                'token_type',
                'expires_in',
            ],
        ]);
    }
}