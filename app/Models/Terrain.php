<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'photo', 
        'prix', 
        'categorie', 
        'statut', 
        'adresse',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }
}
