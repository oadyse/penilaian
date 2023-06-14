<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'siswa';
    protected $guarded = [];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'id', 'pa');
    }
}
