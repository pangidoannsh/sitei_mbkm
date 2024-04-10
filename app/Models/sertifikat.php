<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;
    protected $table = 'mbkm_sertifikat';
    protected $guarded = [];

    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }
}
