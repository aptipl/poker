<?php

namespace App\Repositories;

use App\Interfaces\GameInterface;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameRepository implements GameInterface
{

    public function getAll() {
        return Game::with('votes')->get();
    }

    public function getDetail($id, $code) {
        if($id > 0){
            return Game::with('votes')->where('id', $id)->first();
        }else {
            return Game::with(['votes'=> function($query){
                $query->where('user_id', Auth::user()->id);
            }])
            ->where('code', $code)->first();
        }
    }

    public function create($request) {
        $vote = Game::create([
            'user_id' => Auth::user()->id,
            'number' => $request->number,
            'code' => uniqid(),
        ]);

        return $vote;
    }

    public function destroy($id){
        $user = Game::find($id);
        return $user->delete();
    }

}
