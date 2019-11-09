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

}
