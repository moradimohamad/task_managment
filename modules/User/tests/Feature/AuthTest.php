<?php

namespace Modules\User\tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Modules\User\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_sign_up(): void
    {
        $this->withoutExceptionHandling();
        $data=[
            "name"=>"mohamad",
            "email"=>"mohamad@gmail.com",
            "password"=>"dummypassword",
            'password_confirmation'=>"dummypassword"
        ];
        $response = $this->postJson('/api/register',$data);
        $this->assertDatabaseCount('users',1);

        $response->assertOk();

    }

    public function test_user_can_login()
    {

        $user = User::factory()->make(['password'=>"dummypassword"]);
        $user->save();
        $data = $user->toArray();
        $this->withoutExceptionHandling();
        $data=[

            "email"=>$data['email'],
            "password"=>"dummypassword",

        ];


        $response = $this->postJson('/api/login',$data);

        $response->assertOk();
    }

    public function test_user_can_not_login_with_wrong_password()
    {

        $this->withoutExceptionHandling();

        $this->expectException(ValidationException::class);
        $user = User::factory()->make(['password'=>"dummypassword"]);
        $user->save();
        $data = $user->toArray();
        $this->withoutExceptionHandling();
        $data=[

            "email"=>$data['email'],
            "password"=>"pass",

        ];


        $response = $this->postJson('/api/login',$data);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors([
            'email' => 'wrong email or password',
        ]);
    }
}
