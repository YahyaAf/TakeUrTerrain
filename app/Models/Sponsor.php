<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo'
    ];

    public function terrains()
    {
        return $this->belongsToMany(Terrain::class);
    }

}
