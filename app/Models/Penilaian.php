<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'penilaian';
    protected $guarded = [];

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_siswa', 'id');
    }
}
