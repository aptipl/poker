<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    private $feboCardNumber = [];
    protected $fillable = [
        'user_id',
        'number',
        'code',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function shareURL(){
        return route('game-share', ['code' => $this->code]);
    }

    public function cards()
    {
        $num = $n3 = 0;
        $n1 = 0;
        $n2 = 1;
        while ($num < $this->number ) {
            $n3 = $n2 + $n1;
            $n1 = $n2;
            $n2 = $n3;
            $num = $num + 1;
            array_push($this->feboCardNumber, $n3);
        }
        return $this->feboCardNumber;
    }
}
