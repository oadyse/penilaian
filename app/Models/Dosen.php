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
        return $this->hasMany(Pengampu::class, 'id_kelas', 'id');
    }

    public function matkul()
    {
        return $this->hasMany(Mengajar::class, 'id_dosen', 'id');
    }

    public function mengajar()
    {
        $return = '';
        foreach($this->matkul as $matkul) {
            $return .= $matkul->matkul->matkul .', ';
        }

        return rtrim($return,', ');
    }

    public function mengampu()
    {
        $return = '';
        foreach($this->kelas as $kelas) {
            $return .= $kelas->kelas->kelas .', ';
        }

        return rtrim($return,', ');
    }
}
