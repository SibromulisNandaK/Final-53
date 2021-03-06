@extends('layouts.master')
@section('title', 'Beranda')
    
@section('content')
    <div class="row">
        <div class="col-md-8 m-l-35">
            {{-- menampilkan pertanyaan --}}
            <div class="card">
                <div class="body">
                    <h3>{{ $pertanyaan->judul }}</h3>
                    <p class="font-bold">Ditanyakan oleh {{ $pertanyaan->user->name }}</p>
                    <hr>
                    <div>{{ $pertanyaan->isi }}</div>
                    <div class="m-t-10">
                        @if ($cekVote != null && $cekVote->vote == 'upvote')
                        {{ $jumlahUpvote }} <a href="#" class="vote-pertanyaan"><b>upvote</b></a>
                        @else
                        {{ $jumlahUpvote }} <a href="#" class="vote-pertanyaan">upvote</a>
                        @endif
                        @if ($user->poin_reputasi < 15)
                        {{ $jumlahDownvote }} <span class="text-muted">downvote</span>
                        @else
                            @if ($cekVote != null && $cekVote->vote == 'downvote')
                            {{ $jumlahDownvote }} <a href="#" class="vote-pertanyaan"><b>downvote</b></a>
                            @else
                            {{ $jumlahDownvote }} <a href="#" class="vote-pertanyaan">downvote</a>
                            @endif
                        @endif
                        <div>
                            <form action="/vote/store" method="post">
                                @csrf
                            <input type="hidden" name="pertanyaan_id" value="{{ $pertanyaan->id }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="vote" value="" class="pertanyaan-vote">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- menampilkan jawaban dari pertanyaan --}}
            @foreach ($pertanyaan->jawaban as $jawaban)
                <div class="card">
                    <div class="body">
                        <div>
                            <span class="font-bold">{{ $jawaban->user->name }}</span> membalas :
                        </div>
                        <p class="m-t-10">{{ $jawaban->isi }}</p>
                        <div class="mt-5">                            
                            <a href="#" class="vote-jawaban">upvote</a>
                            @if ($user->poin_reputasi < 15)
                            <span class="vote-jawaban text-muted">downvote</span>
                            @else
                            <a href="#" class="vote-jawaban">downvote</a>
                            @endif
                            <div>
                                <form action="/vote_jawaban/store" method="post">
                                    @csrf
                                    <input type="hidden" name="pertanyaan_id" value="{{ $pertanyaan->id }}">
                                    <input type="hidden" name="jawaban_id" value="{{ $jawaban->id }}">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="vote" value="" class="jawaban-vote">
                                </form>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('script-custom')
    <script>
        $('.vote-pertanyaan').on('click', function(e){
            e.preventDefault();
            $('.pertanyaan-vote').attr('value', $(this).text());
            $('.pertanyaan-vote').closest('form').submit();
            // console.log($(this).html());
        })
        $('.vote-jawaban').on('click', function(e){
            e.preventDefault();
            $('.jawaban-vote').attr('value', $(this).text());
            $(this).siblings('div').children('form').submit();
            // console.log($(this).closest('form'));
        })
    </script>
@endpush