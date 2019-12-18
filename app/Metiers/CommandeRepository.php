<?php
namespace App\Metiers;
use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Produit;
use App\Models\User;
use JWTAuth;
class CommandeRepository{

    function addCommande(Request $request){

        $id=$request->input('produit_id');
        $quantite=$request->input('quantite');
        $produit= Produit::find($id);

        $quantiteFinal=$produit->quantite - $quantite;
        $produit->update(['quantite'=>$quantiteFinal]);

        $commande=new Achat();
        $utilisateur=  JWTAuth::parseToken()->toUser();
        $commande->produit_id=$id;
        $commande->user_id=$utilisateur->user_id;
        $commande->quantite=$quantite;
        $commande->save();
        return $commande;


        
    }
    public function checkQty(Request $request){
        $id=$request->input('produit_id');
        $produit= Produit::find($id);
        return $produit->quantite ;

    }
}