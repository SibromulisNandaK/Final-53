@extends('layouts.master')
@section('title', 'Beranda')
    
@section('content')
    <div class="row">
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $pertanyaan->judul }}</h3>
                    <div>{{ $pertanyaan->isi }}</div>
                    <div class="mt-5">
                        @if ($cekVote !== null)
                        <a href="#" class="vote"><b>upvote</b></a>
                        @else
                        <a href="#" class="vote">upvote</a>
                        @endif
                        @if ($user->poin_reputasi < 15)
                            <span class="text-muted">downvote</span>
                        @else
                        <a href="#" class="vote">downvote</a>
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
        </div>
    </div>
@endsection
@push('script-custom')
    <script>
        $('.vote').on('click', function(e){
            e.preventDefault();
            $('.pertanyaan-vote').attr('value', $(this).html());
            $('.pertanyaan-vote').closest('form').submit();
            // console.log($(this).html());
        })
    </script>
@endpush