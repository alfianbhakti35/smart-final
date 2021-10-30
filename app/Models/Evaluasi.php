<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'soal',
        'materi_id',
        'a',
        'b',
        'c',
        'd',
        'e',
        'jawaban'
    ];
}
