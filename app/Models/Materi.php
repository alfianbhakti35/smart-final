<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'materi_tunanetra',
        'materi_tunarungu',
        'materi_slow_lerning',
        'matakuliah_id',
    ];
}
