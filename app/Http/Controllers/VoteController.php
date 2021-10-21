<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Services\VoteService;

class VoteController extends Controller
{
    private $voteService;

    public function __construct(VoteService $voteService){
        $this->voteService = $voteService;
    }

    public function index()
    {
        $votes = $this->voteService->getMyVotes();

        return view('user.vote_list', compact('votes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoteRequest $request)
    {
        $validated = $request->validated();

        $vote = $this->voteService->create($request);

        return back()->with('success', 'Card flipped successfully');
    }

}
