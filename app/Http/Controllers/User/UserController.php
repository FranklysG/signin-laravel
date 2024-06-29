<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;

class UserController extends Controller
{

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(UserRepository $repository)
    {
        try {
            $users = $repository->getAllWithAddress();
            return $this->apiResponse->successResponse('User registered with success', $users->toArray());
        } catch (QueryException $e) {
            return $this->apiResponse->errorResponse('Error creating user: ' . $e->getMessage());
        } 
    }
}