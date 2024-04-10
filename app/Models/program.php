<?php

namespace App\Models;

use App\Models\mbkm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'mbkm_program';
    protected $guarded = [];

    public function mbkm()
    {
        return $this->hasMany(mbkm::class);
    }
}
