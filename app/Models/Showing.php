<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Showing extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function formattedDate() {
        return  Carbon::parse($this->showing_datetime)->toFormattedDayDateString();
    }

    public function formattedTime() {
        return  Carbon::parse($this->showing_datetime)->format('h A');
    }

    public function scopeActive(Builder $query) {
       $query->where('showing_datetime', '>', now());
    }

    public function otherShowings() {
        return $this->movie->activeShowings->where('id', '<>', $this->id);
    }
}