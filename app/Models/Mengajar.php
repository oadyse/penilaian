<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'mengajar';
    protected $guarded = [];

    public function matkul()
    {
        return $this->hasOne(Matkul::class, 'id', 'id_matkul');
    }
}
