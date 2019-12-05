<?php
namespace App\Metiers;



use Illuminate\Http\Request;


use JWTFactory;
use JWTAuth;
use Validator;
use App\Models\User;

class UtilisateurRepository
{

    // public function add(Request $request)
    // {

    //     $utilisateur = new User();
    //     $utilisateur->name = $request->input("name");
    //     $utilisateur->password = $request->input("password");
    //     $utilisateur->email = $request->input("email");

    //     $utilisateur->save();

    //     return $utilisateur;
    // }
    
    function register(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:user',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return $user;
       
    }

    function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        return $token;
    }
    
}