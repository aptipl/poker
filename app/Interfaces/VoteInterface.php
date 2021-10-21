<?php

namespace App\Interfaces;

interface VoteInterface {

    public function getMyVotes();

    public function create($request);
}
