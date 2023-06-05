<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Game_siswa;

class GameplayController extends Controller
{
    public function index()
    {
        $gameplay = Game_siswa::all();
        return response()->json(['message' => 'Success','data' => $gameplay]);
    }

    public function show($id)
    {
        $gameplay = Game_siswa::find($id);
        return response()->json(['message' => 'Success','data' => $gameplay]);
    }

    public function store(Request $request)
    {
        $gameplay = Game_siswa::create($request->all());
        return response()->json(['message' => 'Success','data' => $gameplay]);
    }

    public function update(Request $request, $id)
    {
        $gameplay = Game_siswa::find($id);
        $gameplay->update($request->all());
        return response()->json(['message' => 'Success','data' => $gameplay]);
    }

    public function destroy($id)
    {
        $gameplay = Game_siswa::find($id);
        $gameplay->delete();
        return response()->json(['message' => 'Success','data' => null]);
    }
}
