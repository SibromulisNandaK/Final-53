<?php

namespace App\Http\Controllers;

use App\User;
use App\Jawaban;
use App\VoteJawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoteJawabanController extends Controller
{
    public function store(Request $request)
    {
        // ambil request user_id, jawaban_id, dan pertanyaan_id
        $user_id = $request->user_id;
        $jawaban_id = $request->jawaban_id;
        $pertanyaan_id = $request->pertanyaan_id;
        // dd($request->all());

        // siapkan data jawaban dan user pemilik jawaban
        $jawaban = Jawaban::find($jawaban_id);
        $userOwner = User::find($jawaban->user_id);

        // cek apakah vote pilihan user sudah ada di dalam database
        $cekVote = DB::table('vote_jawaban')->where(['user_id' => $user_id, 'jawaban_id' => $jawaban_id])->first();
        // dd($cekVote);

        // jika belum ada, tambahkan vote ke dalam database
        if ($cekVote == null) {
            VoteJawaban::create([
                'vote' => $request->vote,
                'jawaban_id' => $jawaban_id,
                'user_id' => $user_id,
            ]);

            // jika vote yang dpilih adalah upvote, tambahkan poin untuk pertanyaan dan user
            if ($request->vote == 'upvote') {
                // update poin jawaban
                $jawaban->poin = $jawaban->poin + 1;
                $jawaban->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi + 10;
                $userOwner->save();
            } elseif ($request->vote == 'downvote') {
                // update poin jawaban
                $jawaban->poin = $jawaban->poin - 1;
                $jawaban->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi - 1;
                $userOwner->save();
            }
        }
        // jika sudah ada, hapus vote dari database lalu kembalikan poin jawaban dan poin user
        else {
            if ($request->vote == 'upvote') {
                // update poin jawaban
                $jawaban->poin = $jawaban->poin - 1;
                $jawaban->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi - 10;
                $userOwner->save();
            } elseif ($request->vote == 'downvote') {
                // update poin jawaban
                $jawaban->poin = $jawaban->poin + 1;
                $jawaban->save();

                // update poin user
                $userOwner->poin_reputasi = $userOwner->poin_reputasi + 1;
                $userOwner->save();
            }
            VoteJawaban::where('id', $cekVote->id)->delete();
        }

        return redirect("/home/pertanyaan/$pertanyaan_id");
    }
}
