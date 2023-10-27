<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'genre', 'poster'
    ] ;

    public function showings(){
        return $this->hasMany(Showing::class);
    }

    public function activeShowings(){
        return $this->showings()->where('showing_datetime', '>', now());
    }

    public function getPosterUrl() {
        if (Str::contains($this->poster, "https")){
            return $this->poster;
        } else {
            return Storage::disk('images')->url($this->poster);
        }
    }
}
