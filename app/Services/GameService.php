<?php

namespace App\Services;

use App\Interfaces\GameInterface;

class GameService {

    private $gameRepository;

	public function __construct(GameInterface $gameRepository)
	{
	   $this->gameRepository = $gameRepository;
	}

    public function getAll()
    {
        return $this->gameRepository->getAll();
    }

    public function getDetail($id, $code)
    {
        return $this->gameRepository->getDetail($id, $code);
    }

    public function create($request)
    {
        return $this->gameRepository->create($request);
    }


    public function destroy($id)
    {
        return $this->gameRepository->destroy($id);
    }

}
