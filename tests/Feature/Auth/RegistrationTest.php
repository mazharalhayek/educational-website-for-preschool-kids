<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected $parent;


    public function setUp(): void
    {
        parent::setUp();
        $this->parent = [
            'name' => 'Test Parent User',
            'email' => 'testparent@example.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'type' => 'parent',
            'birth_date' => '1994-12-12',
        ];
    }

    /**
     * TestCase ID: 1001
     * Parent enters account information to create an account
     * @return void
     */
    public function test_parent_can_register_account(): void
    {
        $response = $this->post('/register', $this->parent);

        $this->assertAuthenticated();
        $response->assertStatus(200);
        $response->assertOk();
    }

    /**
     * TestCase ID: 1002
     * Parent can create an account for the student
     * @return void
     */
    public function test_parent_can_create_a_student_account(): void
    {
        $response = $this->post('/register', $this->parent);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
