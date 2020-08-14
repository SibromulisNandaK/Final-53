<?php

namespace App\Http\Controllers;

use App\VotePertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotePertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $pertanyaan_id = $request->pertanyaan_id;
        $cekVote = DB::table('vote_pertanyaan')->where(['user_id' => $user_id, 'pertanyaan_id' => $pertanyaan_id])->first();
        // dd($cekVote);

        if ($cekVote == null) {
            VotePertanyaan::create([
                'vote' => $request->vote,
                'pertanyaan_id' => $pertanyaan_id,
                'user_id' => $user_id,
            ]);
        } else {
            VotePertanyaan::where('id', $cekVote->id)->delete();
        }

        return redirect("/pertanyaan/$pertanyaan_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VotePertanyaan  $votePertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(VotePertanyaan $votePertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VotePertanyaan  $votePertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(VotePertanyaan $votePertanyaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VotePertanyaan  $votePertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VotePertanyaan $votePertanyaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VotePertanyaan  $votePertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(VotePertanyaan $votePertanyaan)
    {
        //
    }
}
