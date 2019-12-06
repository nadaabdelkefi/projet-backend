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

    public function show(){
        $users = $this->utilisateurRepository->show();
        
        return response()->json($users, 200);
     }

     public function deleteUser($user_id)
    {
        $user = $this->utilisateurRepository->search($user_id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $this->utilisateurRepository->delete($user);

        return response()->json(['message' => 'User deleted'], 200);
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