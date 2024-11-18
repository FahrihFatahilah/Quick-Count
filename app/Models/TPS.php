<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TPS extends Model
{
    use HasFactory;

    protected $table = 'tps';

    protected $fillable = ['id','location_name','kelurahan_id'];

    // Relationship with User
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function votes()
    {
        return $this->hasMany(VotesResults::class);
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }
}
