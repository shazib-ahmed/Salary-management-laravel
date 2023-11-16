<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at', 'updated_at'];

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function season(){
        return $this->belongsTo(Season::class);
    }
}
