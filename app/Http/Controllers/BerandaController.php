<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function all()
    {
        $pertanyaan = Pertanyaan::all();
        return view('beranda.all', compact('pertanyaan'));
    }

    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $user = Auth::user();
        $cekVote = DB::table('vote_pertanyaan')->where(['pertanyaan_id' => $id, 'user_id' => $user->id])->exists();
        return view('beranda.show', compact(['pertanyaan', 'user', 'cekVote']));
    }
}
