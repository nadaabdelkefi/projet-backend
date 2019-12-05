<?php

namespace App\Http\Controllers;

use App\Metiers\UtilisateurRepository;
use Illuminate\Http\Request;
use App\Models\User;

class UtilisateurController extends Controller
{

    protected $utilisateurRepository;

    function __construct(UtilisateurRepository $utilisateurRepository)
    {
        $this->utilisateurRepository = $utilisateurRepository;
    }
    
    public function register(Request $request)
    {
        $user = $this->utilisateurRepository->register($request);
         

        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
       $token = $this->utilisateurRepository->login($request);

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }

}