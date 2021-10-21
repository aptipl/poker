<?php

namespace App\Services;

use App\Interfaces\VoteInterface;

class VoteService {

    private $voteRepository;

	public function __construct(VoteInterface $voteRepository)
	{
	   $this->voteRepository = $voteRepository;
	}

    public function getMyVotes()
    {
        return $this->voteRepository->getMyVotes();
    }

    public function create($request)
    {
        return $this->voteRepository->create($request);
    }

}
