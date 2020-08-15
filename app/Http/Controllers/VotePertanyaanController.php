<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use App\User;
use App\VotePertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotePertanyaanController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        // ambil request user_id, pertanyaan_id
        $user_id = $request->user_id;
        $pertanyaan_id = $request->pertanyaan_id;

        // siapkan data pertanyaan dan user pemilik pertanyaan
        $pertanyaan = Pertanyaan::find($pertanyaan_id);
        $userOwner = User::find($pertanyaan->user_id);
        // dd($userOwner);

        // cek apakah vote pilihan user sudah ada di dalam database
        $cekVote = DB::table('vote_pertanyaan')->where(['user_id' => $user_id, 'pertanyaan_id' => $pertanyaan_id])->first();
        // dd($cekVote);

        // jika belum ada, tambahkan vote ke dalam database
        if ($cekVote == null) {
            VotePertanyaan::create([
                'vote' => $request->vote,
                'pertanyaan_id' => $pertanyaan_id,
                'user_id' => $user_id,
            ]);

            // jika vote yang dpilih adalah upvote, tambahkan poin untuk pertanyaan dan user
            if ($request->vote == 'upvote') {
                // update poin pertanyaan
                $pertanyaan->poin = $pertanyaan->poin + 1;
                $pertanyaan->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi + 10;
                $userOwner->save();
            } elseif ($request->vote == 'downvote') {
                // update poin pertanyaan
                $pertanyaan->poin = $pertanyaan->poin - 1;
                $pertanyaan->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi - 1;
                $userOwner->save();
            }

            // jika sudah ada, hapus vote dari database lalu kembalikan poin pertanyaan dan poin user
        } else {
            if ($request->vote == 'upvote') {
                // update poin pertanyaan
                $pertanyaan->poin = $pertanyaan->poin - 1;
                $pertanyaan->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi - 10;
                $userOwner->save();
            } elseif ($request->vote == 'downvote') {
                // update poin pertanyaan
                $pertanyaan->poin = $pertanyaan->poin + 1;
                $pertanyaan->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi + 1;
                $userOwner->save();
            }
            VotePertanyaan::where('id', $cekVote->id)->delete();
        }

        return redirect("/home/pertanyaan/$pertanyaan_id");
    }
}
