<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $keyType = 'string';
    protected $table = 'soal';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'kreator', 'id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'id_soal', 'id');
    }
}
