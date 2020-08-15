<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $pertanyaan = Pertanyaan::all();
        return view('beranda.all', compact('pertanyaan'));
    }

    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $user = Auth::user();
        $cekVote = DB::table('vote_pertanyaan')->where(['pertanyaan_id' => $id, 'user_id' => $user->id])->first();
        $jumlahUpvote = DB::table('vote_pertanyaan')->where(['vote' => 'upvote', 'pertanyaan_id' => $id])->count();
        $jumlahDownvote = DB::table('vote_pertanyaan')->where(['vote' => 'downvote', 'pertanyaan_id' => $id])->count();
        // dd($cekVote);

        return view('beranda.show', compact(['pertanyaan', 'user', 'cekVote', 'jumlahUpvote', 'jumlahDownvote']));
    }
}
