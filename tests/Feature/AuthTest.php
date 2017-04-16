<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthTest extends TestCase
{

    public function testLoginPageDisplay()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testRedirectionHomeLogin()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    public function testNotAccessToSite()
    {
        $response = $this->get('/gammes');
        $response->assertRedirect('/login');
        $response->assertStatus(302);
    }


    public function testUserCanViewApp()
    {
        $user = factory(User::class)->make([
            'email' => 'admin@madera.fr',
        ]);

        $response = $this->actingAs($user)
            ->get('/gammes')
            ->assertStatus(200);

        $responseAccessLogin = $this->actingAs($user)->get('/login')->assertStatus(302);
    }
}
