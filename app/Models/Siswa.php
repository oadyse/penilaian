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

    public function nilai()
    {
        return $this->hasMany(Penilaian::class, 'id_siswa', 'id');
    }

    public function hitungPenilaian() {
        $total = 0;
        foreach($this->nilai as $nilai) {
            $total += $nilai->nilai;
        }
        
        return $total;
    }
}
