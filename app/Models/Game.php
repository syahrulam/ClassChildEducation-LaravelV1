<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'game';
    protected $fillable = ['katagorigame','keterangan'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai','created_at','updated_at']);
    }
}
