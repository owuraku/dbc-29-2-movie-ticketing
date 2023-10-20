<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function showings(){
        return $this->hasMany(Showing::class);
    }

    public function activeShowings(){
        return $this->showings()->where('showing_datetime', '>', now());
    }
}
