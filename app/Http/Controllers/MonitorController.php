<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Siswa;
use App\Exports\DataNilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class MonitorController extends Controller
{
    public function index()
    {
        $siswa = \App\Models\Siswa::all();
        $game = \App\Models\Game::all();

        $return = [
            'siswa',
            'game',
        ];
        return view('monitor', compact($return));
    }

    public function kategorigame()
    {
     
        $vargame = DB::table('game')->get();

        $return = [
            'vargame',
        ];
        return view('kategorigame', compact($return));
    }
    public function exportToExcel()
    {
        return Excel::download(new DataNilaiExport, 'data_nilai.xlsx');
    }
}