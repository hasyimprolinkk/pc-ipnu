<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'kegiatan' => Kegiatan::count(),
            'anggota'  => User::where('roles', 'user')->count(),
            'petugas'  => User::where('roles', 'petugas')->count(),
            ]
        );
    }
}
