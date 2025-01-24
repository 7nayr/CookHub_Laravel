<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date', 'duration'];

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'participant_workshop');
    }
}
