<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konversi extends Model
{
    use HasFactory;
    protected $table = 'konversi';
    protected $guarded = [];

    public $timestamps = false;

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }

}
