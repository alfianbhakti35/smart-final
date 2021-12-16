<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        User::create([
            'nama' => 'ADMIN',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'nim' => 123123,
            'level' => 'admin',
            'prodi_id' => 1
        ]);

        redirect()->to('/');
    }
}
