<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jumlah',
        'harga',
        'foto',
    ];

    // Menyimpan file foto
    public function setFotoAttribute($value)
    {
        if ($value) {
            $this->attributes['foto'] = $value;
        }
    }

    // Menyediakan URL file foto jika ada
    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return null;
        }
        return asset('storage/' . $this->foto);
    }

}
