<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'matkul';
    protected $guarded = [];

    public function penilaian($id)
    {
        return $this->hasOne(Penilaian::class, 'id_matkul', 'id')->where('id_siswa',$id)->first();
    }
}
