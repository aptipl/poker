<?php

namespace App\Repositories;

use App\Interfaces\VoteInterface;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VoteRepository implements VoteInterface
{

    public function getMyVotes() {
        return Vote::with('game')->where('user_id', Auth::user()->id)->get();
    }
    public function create($request) {

        $vote = Vote::create([
            'user_id' => Auth::user()->id,
            'game_id' => $request->game_id,
            'number' => $request->number,
        ]);

        return $vote;
    }

}
