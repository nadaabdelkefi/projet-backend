<?php
namespace App\Metiers;


use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurRepository
{

    public function add(Request $request)
    {

        $utilisateur = new User();
        $utilisateur->name = $request->input("name");
        $utilisateur->password = $request->input("password");
        $utilisateur->email = $request->input("email");

        $utilisateur->save();

        return $utilisateur;
    }
    
    public function login(Request $request)
    {
        //login
    }
    
}