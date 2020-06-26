<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    public function index() {
        $cards = Card::all();

        if($cards){
            return response()->json($cards, 200);

        }
    }
    public function create(Request $request){

        $card = new Card;

        $card->title = $request->title;
        $card->content = $request->content;

        $card->save();

        if($card){
            return response()->json($card,201);
        }

    }
    public function edit(Request $request, $id){

        $card = Card::find($id);

        $card->title = $request->title;
        $card->content = $request->content;

        $card->update();
            
        if($card){
            return response()->json($card,201);
        }

    }
    public function delete($id){

        $card = Card::find($id);

        if ($card->delete()){
            return response()->json('Registro excluido com sucesso');

        };
            
    }
}
