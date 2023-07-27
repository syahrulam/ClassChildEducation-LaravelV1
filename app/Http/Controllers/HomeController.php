<?php

namespace App\Http\Controllers;

use App\Models\Game_siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $guru = User::count();
        $siswa = Siswa::count();
        $nilai = Game_siswa::count();

        return view('dashboard', compact('guru','siswa','nilai'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }
}
