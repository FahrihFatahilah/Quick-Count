<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatan';
    protected $fillable = ['id','name'];

    // Define the relation with Kelurahan
    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }
}
