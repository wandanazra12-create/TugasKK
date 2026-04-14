<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kata extends Model
{
    use HasFactory;

    protected $fillable = [
        'huruf_id',
        'kata',
        'deskripsi',
    ];

    /**
     * Relasi: Kata milik satu Huruf
     */
    public function huruf()
    {
        return $this->belongsTo(Huruf::class);
    }

    /**
     * Relasi: Kata memiliki banyak Kalimat
     */
    public function kalimats()
    {
        return $this->hasMany(Kalimat::class);
    }
}

