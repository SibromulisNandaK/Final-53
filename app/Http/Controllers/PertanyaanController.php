<?php

namespace App\Http\Controllers;

use App\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaans = Pertanyaan::where('user_id', Auth::id())->get();
        return view('pertanyaan.index', compact('pertanyaans', $pertanyaans));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create', ['user_id' => Auth::id()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul = $request["judul"];
        $pertanyaan->isi   = $request["isi"];
        $pertanyaan->user_id = $request['user_id'];
        $pertanyaan->save(); /// ini disimpan dengan perintah save()
        return redirect('/pertanyaan')->with('success', 'Posting pertanyaan Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        return view('pertanyaan.show', compact('pertanyaan$', $pertanyaan));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaans = Pertanyaan::find($id);
        return view('pertanyaans.edit', compact('pertanyaans', $pertanyaans));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Pertanyaan::where('id', $id)->update([
            "judul" => $request["judul"],
            "isi" => $request["isi"]
        ]);
        return redirect('/pertanyaans')->with('success', 'Berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pertanyaan::destroy($id);
        return redirect('/pertanyaans')->with('success', 'Berhasil dihapus');
    }
}
