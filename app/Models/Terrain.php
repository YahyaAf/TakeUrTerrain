<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'description',
        'photo',
        'categorie_id',
        'prix', 
        'categorie',
        'disponibility',
        'statut', 
        'adresse',
        'user_id'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
