<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $table = 'desa';


    // Define the relation with Kelurahan
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    // Define the relation with TPS
    public function tps()
    {
        return $this->hasMany(Tps::class);
    }
}
