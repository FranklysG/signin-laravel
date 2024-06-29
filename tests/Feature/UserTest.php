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
            'password' => 'password',
        ];

        $response = $this->post(route('api.auth.store'), $data);
        $user = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(7, count($user['data']));
        $this->assertNotNull($user);
    }

    /** test */
    public function test_try_create_user_with_address()
    {
        $data = [
            'name' => 'Claudio Duarte',
            'email' => 'caludio.duarte@gmail.com',
            'password' => 'password',
            "address" => [
                'street' => 'Rua Exemplo',
                'district' => 'Bairro Exemplo',
                'number' => '123',
                'city' => 'Cidade Exemplo',
                'state' => 'Estado Exemplo',
                'country' => 'Pais Exemplo',
                'postal_code' => '12345-678',
            ]
        ];

        $response = $this->post(route('api.auth.store'), $data);
        $user = $response->json();
        
        $response->assertStatus(200);
        $this->assertEquals(7, count($user['data']));
        $this->assertNotNull($user);
    }
}
