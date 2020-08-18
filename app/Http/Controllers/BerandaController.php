<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function all()
    {
        $pertanyaan = Pertanyaan::all();
        return view('beranda.all', compact('pertanyaan'));
    }

    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        // $jawaban = 
        $user = Auth::user();
        $cekVote = DB::table('vote_pertanyaan')->where(['pertanyaan_id' => $id, 'user_id' => $user->id])->exists();
        $jumlahUpvote = DB::table('vote_pertanyaan')->where(['vote' => 'upvote', 'pertanyaan_id' => $id])->count();
        $jumlahDownvote = DB::table('vote_pertanyaan')->where(['vote' => 'downvote', 'pertanyaan_id' => $id])->count();


        return view('beranda.show', compact(['pertanyaan', 'user', 'cekVote', 'jumlahUpvote', 'jumlahDownvote']));
    }
}
