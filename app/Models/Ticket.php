<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'reservation_id',
        'terrain_id',
        'payment_id',
        'price',
        'user_id',
        'status',
        'code_unique'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
