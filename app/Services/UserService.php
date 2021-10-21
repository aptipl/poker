<?php

namespace App\Services;

use App\Interfaces\UserInterface;
use http\Client\Curl\User;

class UserService {

    private $userRepository;

	public function __construct(UserInterface $userRepository)
	{
	   $this->userRepository = $userRepository;
	}

	public function getAll(){
        return $this->userRepository->getAll();
    }

	public function update($request, $user){
        return $this->userRepository->update($request, $user);
    }

	public function destroy($id){
        return $this->userRepository->destroy($id);
    }

}
