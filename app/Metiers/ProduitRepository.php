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
use Validator;
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
        $produits = Produit::all();

        return $produits;
    }

    public function search($produit_id)
    {
        $produit = Produit::find($produit_id);

        return $produit;
    }
    
    public function delete($produit)
    {
        $produit->delete();

        return $produit;
    }

    public function update($request, $produit)
    {
        $validator = Validator::make($request->all(), [
            'produit_id' => 'required',
            'titre' => 'required|string',
            'prix' => 'required',
            'quantite' => 'required'
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $produit->titre = $request->input("titre");
        $produit->prix = $request->input("prix");
        $produit->quantite = $request->input("quantite");

        $produit->update();

        return $produit;
    }

}
