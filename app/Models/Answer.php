<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'answer';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class, 'id_soal', 'id');
    }

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'id_siswa', 'id_siswa');
    }
}
