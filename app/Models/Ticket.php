<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ticket extends Model
{
    use HasFactory, HasUuids;
    
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'showing_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function showing() {
        return $this->belongsTo(Showing::class);
    }
}
