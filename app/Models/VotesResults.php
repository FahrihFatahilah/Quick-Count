<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VotesResults extends Model
{
    use HasFactory;

    protected $table = 'votes';

    protected $fillable = ['tps_id', 'candidate_id', 'votes'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'id'); // Foreign key: 'candidate_id' and primary key in candidates: 'id'
    }

    // Define the relationship with the TPS model
    public function tps()
    {
        return $this->belongsTo(TPS::class, 'tps_id', 'id'); // Foreign key: 'tps_id' and primary key in tps: 'id'
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Foreign key: 'user_id' and primary key in users: 'id'
    }
}
