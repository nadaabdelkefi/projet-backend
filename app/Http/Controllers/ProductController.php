<?php

namespace App\Http\Controllers;

use App\Metiers\ProduitRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $produitRepository;

    function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
    }

    public function add(Request $request)
    {
        if (!$request->has(['titre', 'prix', 'quantite'])) {
            return response()->json(['error' => 'bad request'], 400);
        }

        $this->produitRepository->add($request);

        return response()->json(['message' => 'add product success']);

    }

    public function show(){
        $produits = $this->produitRepository->show();
        
        return response()->json($produits, 200);
     }

     public function deleteProduit(Request $request ,$produit_id)
    {
        $produit = $this->produitRepository->search($produit_id);

        if (!$produit) {
            return response()->json(['message' => 'Produit not found'], 404);
        }

        $produit->delete();

        return response()->json(['message' => 'Produit deleted'], 200);
    }

}
