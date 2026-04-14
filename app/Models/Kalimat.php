<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalimat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kata_id',
        'kalimat',
        'deskripsi',
    ];

    /**
     * Relasi: Kalimat milik satu Kata
     */
    public function kata()
    {
        return $this->belongsTo(Kata::class);
    }
}

