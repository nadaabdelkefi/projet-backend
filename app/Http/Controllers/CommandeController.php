<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metiers\CommandeRepository;

class CommandeController extends Controller
{
    protected $commandeRepository;
    function __construct(CommandeRepository $commandeRepository){
        $this->commandeRepository = $commandeRepository;
    }
    
    
    public function acheter(Request $request){
        $qty = $this->commandeRepository->checkQty($request);
        if ($qty == 0) {
            return response()->json(['error'=>'finished stock']);

        }else if ($request->input('quantite') > $qty){
            return response()->json(['error'=>'insufficient stock']);
        }

        $this->commandeRepository->addCommande($request);

        return response()->json(['success'=>'achat valide']);
    }
}
