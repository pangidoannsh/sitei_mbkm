<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(user::class);
    }
    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }
    public function dosen()
    {
        return $this->hasMany(dosen::class);
    }
}
