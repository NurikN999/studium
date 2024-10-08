<?php
namespace Tests\Unit\Api\City;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class CourseTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_test_course_creation()
    {
        // Arrange
        $user = User::factory()->create([
            'firstname' => 'Nurmukhamed',
            'lastname' => 'Nurkamal',
            'email' => 'nurkamal433@gmail.com',
            'password' => Hash::make('password')
        ]);

        // Generate JWT token for the user
        $token = JWTAuth::fromUser($user);

        // Act
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/courses', [
            'title' => 'Test',
            'description' => 'test description'
        ]);

        // Assert
        $response->assertStatus(201);
    }
}