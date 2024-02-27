<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan_poliklinik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function dokter()
    {
        return $this->hasMany(Dokter::class);
    }
}
