<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Validator;

class CardController extends Controller
{
    public function index()
    {
        return response()->json(Card::all());
    }

    public function store(Request $request)
    {
        $rules = array(
            'titulo' => 'required|string|min:1|max:255',
            'conteudo' => 'required|string|min:1|max:255',
            'lista' => 'required|string|min:1|max:255'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(
                $validator->errors(),
                400
            );
        } else {
            $card = Card::create($request->all());
    
            return response()->json($card, 201);
        }
    }

    public function update(Request $request, string $id)
    {
        $rules = array(
            'titulo' => 'required|string|min:1|max:255',
            'conteudo' => 'required|string|min:1|max:255',
            'lista' => 'required|string|min:1|max:255'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json(
                $validator->errors(),
                400
            );
        } else {
            $card = Card::find($id);

            if ($card) {
                $card->update($request->all());
                return response()->json($card);
            } else {
                return response()->json('Card not found', 404);
            }
        }
    }

    public function destroy(string $id)
    {
        $card = Card::find($id);

        if ($card) {
            $card->delete();
            return response()->json(Card::all());
        } else {
            return response()->json('Card not found', 404);
        }
    }
}
