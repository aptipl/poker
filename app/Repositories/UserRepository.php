<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;

use App\Models\User;

class UserRepository implements UserInterface
{

	public function getAll() {
        return User::where([
            ['type', '!=', 'admin'],
        ])->get();
    }

    public function update($request, $user){
//	    $user = User::find($id);
        return $user->update([
            'is_block' => $request->is_block
        ]);
    }

    public function destroy($id){
        $user = User::find($id);
        return $user->delete();
    }

}
