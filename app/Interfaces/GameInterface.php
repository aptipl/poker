<?php

namespace App\Interfaces;

interface GameInterface {

    public function getAll();

    public function getDetail($id, $code);

    public function create($request);

    public function destroy($id);

}
