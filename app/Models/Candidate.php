<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidates';

    protected $fillable = ['name', 'number', 'photo'];

    public function votes()
    {
        return $this->hasMany(VotesResults::class);
    }

}
