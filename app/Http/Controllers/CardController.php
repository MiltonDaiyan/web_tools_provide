<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public $card;
    public function card()
    {
        return view('card.index-card',[
            'cards' => Card::paginate(5),
        ]);
    }

    public function saveCard(Request $request)
    {
        Card::saveCard($request);
        return back();
    }

    public function deleteCard($id)
    {
        $this->card = Card::find($id);
        $this->card->delete();
        return back();
    }

    public function editCard($id)
    {
        $this->card = Card::find($id);
        return view('card.edit-card',[
            'card' => $this->card,
        ]);
    }

    public function saveEditCard(Request $request)
    {
        Card::saveEditCard($request);
        return redirect(route('card'));
    }
}
