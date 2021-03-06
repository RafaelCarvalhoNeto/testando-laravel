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

        $image = $request->file('image');
        if(empty($image)){
            $pathRelative = null;
        } else {
            $image->storePublicly('uploads');
            $absolutePath = public_path()."/storage/uploads";
            $image_name = $image->getClientOriginalName();

            $image->move($absolutePath, $image_name);

            $pathRelative = "storage/uploads/$image_name";
        }

        $card = new Card;

        $card->title = $request->title;
        $card->image = $pathRelative;
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

            $cards = Card::paginate(10);



            return view('cards.index')->with([
                'cards' => $cards,
                'success' => 'Registro excluido com sucesso'
            ]);

        };
            
    }

    public function searchCard(Request $request){
        $search = $request->input('search');
        $cards = Card::where('title', 'like' ,'%' .$search. '%')->orWhere('content','like','%'.$search.'%')->paginate(10);


        return view('cards.index')->with([
            'search'=>$search,
            'cards'=> $cards
        ]);

    }
}
