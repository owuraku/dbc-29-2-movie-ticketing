<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'genre', 'poster'
    ] ;

    protected $appends = ['poster'];

    public function showings(){
        return $this->hasMany(Showing::class);
    }

    public function activeShowings(){
        return $this->showings()->where('showing_datetime', '>', now());
    }

    // public function poster {
    //     if (Str::contains($this->poster, "https")){
    //         return $this->poster;
    //     } else {
    //         return Storage::disk('images')->url($this->poster);
    //     }
    // }

    protected function poster(): Attribute {
        return Attribute::make(
            get: fn ($path, array $attributes) => Str::contains($attributes['poster'], "http") ? $attributes['poster'] : Storage::disk('images')->url($attributes['poster']) ,
        );
    }
}
