@extends('layouts.master')
@section('title', 'Beranda')
    
@section('content')
    <div class="row">
        @forelse ($pertanyaan as $p)
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $p->judul }}</h3>
                    <div>{{ $p->isi }}</div>
                    <div>
                        <a href="/pertanyaan/{{ $p->id }}">Read more</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
            Tidak ada pertanyaan
        @endforelse
    </div>
@endsection