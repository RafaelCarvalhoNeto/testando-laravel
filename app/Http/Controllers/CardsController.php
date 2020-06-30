<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    public function index() {
        // $cards = Card::all();

        $cards = Card::paginate(10);

        // $cards = Card::where('id', '<=', '20')->get();

        if($cards){
            return view('cards.index')->with('cards', $cards);

        }
    }
    public function add(){
        return view('cards.create');
    }
    public function create(Request $request){

        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:20'
        ]);

        $card = new Card;

        $card->title = $request->title;
        $card->content = $request->content;

        $card->save();

        if($card){
            return view('cards.create')->with('success', 'Cartão inserido com sucesso');
        }

    }
    public function edit($id){
        $card = Card::find($id);

        if($card){
            return view('cards.edit')->with('card', $card);
        }

    }

    public function update(Request $request, $id){
        
        $request->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:20'
        ]);
        $card = Card::find($id);


        $card->title = $request->title;
        $card->content = $request->content;

        $card->update();
            
        if($card){
            return view('cards.edit')->with([
                'card'=> $card,
                'success' => 'Cartão alterado com sucesso'
            ]);
        }

    }
    public function delete($id){

        $card = Card::find($id);

        if ($card->delete()){

            $cards = Card::all();



            return view('cards.index')->with([
                'cards' => $cards,
                'success' => 'Registro excluido com sucesso'
            ]);

        };
            
    }
}
