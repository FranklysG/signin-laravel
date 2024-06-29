<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use App\Http\Requests\Auth\StoreRequest;
use App\Repositories\UserRepository;
use Exception;
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
    public function auth(SignInRequest $request, UserRepository $repository)
    {
        try {
            $data = $request->validated();
            $status = Auth::attempt($data);

            if($status){
                $email = $data['email'];
                $user = $repository->getUserByEmail($email);
                Auth::login($user);
                $user->token = $user->createToken('auth_token')->plainTextToken;
            } else {
                return $this->apiResponse->errorResponse('Usuario não encontrado', 404, 404);
            }

            return $this->apiResponse->successResponse('User logged with success', $user->toArray());
        } catch (QueryException $e) {
            return $this->apiResponse->errorResponse('Error creating user: ' . $e->getMessage());
        } 
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\SignInRequest  $request
     * @param  \App\Repositories\UserRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, UserRepository $repository)
    {
        try {
            $data = $request->validated();
            $user = $repository->create($data);
            
            Auth::login($user);
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

        return response()->noContent();
    }
}