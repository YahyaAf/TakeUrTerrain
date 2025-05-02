<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['terrain_id', 'user_id', 'commentaire', 'note'];

    protected $table = 'feedbacks'; 

    public function terrain()
    {
        return $this->belongsTo(Terrain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

