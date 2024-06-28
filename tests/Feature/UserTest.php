<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\Group;

class UserTest extends TestCase
{
    /** test */
    public function test_try_create_user()
    {
        $data = [
            'name' => 'Claudio Duarte',
            'email' => 'caludio.duarte@gmail.com',
            'password' => 'password'
        ];

        $response = $this->post(route('api.signin.store'), $data);
        $user = $response->json();
        
        $response->assertStatus(200);
        $this->assertEquals(6, count($user['data']));
        $this->assertNotNull($user);
    }
}
