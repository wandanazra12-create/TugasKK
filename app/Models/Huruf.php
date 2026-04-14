<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Huruf extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_huruf',
        'kalimat',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Relasi: Huruf memiliki banyak Kata
     */
    public function katas()
    {
        return $this->hasMany(Kata::class);
    }

    /**
     * Scope untuk search.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('nama_huruf', 'like', "%{$search}%")
                    ->orWhere('kalimat', 'like', "%{$search}%");
    }
}