<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    private $gameService;

    public function __construct(GameService $gameService){
        $this->gameService = $gameService;
    }

    public function index()
    {
        $games = $this->gameService->getAll();

        return view('admin.game_list', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.game_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $validated = $request->validated();

        $game = $this->gameService->create($request);

        return redirect()->route('games.show', $game->id)->with('success', 'Game created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this->gameService->getDetail($id, 0);
        $votes = $game->votes->groupBy('number');
        return view('admin.game_detail', compact('game', 'votes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function voting($code)
    {
        $game = $this->gameService->getDetail(0, $code);
        $number = 0;
        foreach ($game->votes as $vote){
            $number = $vote->number;
        }
        return view('user.game_vote', compact('game', 'number'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->gameService->destroy($id)){
            return back()->with('success', 'Game deleted successfully');
        }else{
            return back()->with('danger', 'Could not delete game. Try again after some time.');
        }
    }
}
