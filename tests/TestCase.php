<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    public function signIn() : User
    {
        $user = User::factory()->create();
        Auth::login($user);
        return $user;
    }
}