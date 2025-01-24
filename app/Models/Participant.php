<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function workshops()
    {
        return $this->belongsToMany(Workshop::class, 'participant_workshop');
    }
}
