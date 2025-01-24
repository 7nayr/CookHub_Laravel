<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'ingredients',
        'instructions',
        'image',
        'average_rating'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
