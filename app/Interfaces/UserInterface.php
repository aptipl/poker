<?php

namespace App\Interfaces;

use http\Client\Curl\User;

interface UserInterface {

    public function getAll();

    public function update($request, $user);

    public function destroy($id);
}
