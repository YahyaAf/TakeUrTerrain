<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'terrain_id',
        'date_reservation',
        'heure_debut',
        'heure_fin',
        'creneaux',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

}
