@extends('layouts.master')
@section('title', 'Beranda')
    
@section('content')
    <div class="row">
        @forelse ($pertanyaan as $p)
        <div class="col-md-8">
            <div class="card">
                <div class="body">
                    <h3>{{ $p->judul }}</h3>
                    <p class="text-muted font-bold">Ditanyakan oleh {{ $p->user->name }}</p>
                    <hr>
                    <div>{{ Str::limit($p->isi, 100) }}</div>
                    <div class="m-t-10">
                        <a href="/home/pertanyaan/{{ $p->id }}">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            Tidak ada pertanyaan
        @endforelse
    </div>
@endsection