<?php

namespace App\Http\Controllers;

use App\Metiers\UtilisateurRepository;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{

    protected $utilisateurRepository;

    function __construct(UtilisateurRepository $utilisateurRepository)
    {
        $this->utilisateurRepository = $utilisateurRepository;
    }
    
    public function add(Request $request)
    {
        if (!$request->has(['name', 'password', 'email'])) {
            return response()->json(['error' => 'bad request'], 400);
        }
        $this->utilisateurRepository->add($request);
        return response()->json(['message' => 'add user success']);
    }

    public function login(Request $request)
    {
       //login
    }

}