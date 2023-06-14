<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'dosen';
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function matkul()
    {
        return $this->hasOne(Matkul::class, 'id', 'id_kmatkul');
    }
}
