<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $table = 'kelurahan';

    protected $fillable = ['name','kecamatan_id'];

    // Define the relation with Kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }

    // Define the relation with Desa
    public function desas()
    {
        return $this->hasMany(Desa::class);
    }
}
