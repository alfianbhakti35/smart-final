<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakultasUniv extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];
}
