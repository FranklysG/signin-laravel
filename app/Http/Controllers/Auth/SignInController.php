<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Repositories\UserRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SignInController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\SignInRequest  $request
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(AuthRequest $request, UserRepository $repository)
    {
        try {
            $data = $request->validated();
            $user = $repository->create($data);
            $user->token = $user->createToken('auth_token')->plainTextToken;

            return $this->apiResponse->successResponse('User registered with success', $user->toArray());
        } catch (QueryException $e) {
            return $this->apiResponse->errorResponse('Error creating user: ' . $e->getMessage());
        } 
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        Auth::guard('web')->logout();

        Session::flush();
        Session::regenerateToken();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->noContent();
    }
}