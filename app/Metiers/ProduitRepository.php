<?php
/**
 * Created by IntelliJ IDEA.
 * User: ABBES
 * Date: 09/11/2019
 * Time: 13:54
 */

namespace App\Metiers;


use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitRepository
{

    public function add(Request $request)
    {

        $produit = new Produit();
        $produit->titre = $request->input("titre");
        $produit->prix = $request->input("prix");
        $produit->quantite = $request->input("quantite");

        $produit->save();

        return $produit;
    }
    public function show(){
        $data = [
            'id'=>$id ,
            'titre'=>$titre,
            'prix'=>$prix,
            'quantite'=>$quantite,
        ];
     return response()->json($data); 
    }
    }