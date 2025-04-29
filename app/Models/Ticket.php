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
}
