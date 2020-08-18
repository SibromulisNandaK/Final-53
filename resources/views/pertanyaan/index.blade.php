@extends('layouts.master')
@section('title', 'Pertanyaan Saya')
    
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>
            Data Pertanyaan
        </h2>
    </div>
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Data Pertanyaan
                    </h2>
                    <a href="/pertanyaan/create" style="margin-top:15px;" class="btn btn-success">Buat Pertanyaan</a>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Pembuat</th>
                                    <th>Jawaban_tepat</th>
                                    <th>Poin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pertanyaans as $pertanyaan)
                                    <tr>
                                        <td>{{ $pertanyaan->id }}</td>
                                        <td>{{ $pertanyaan->judul }}</td>
                                        <td>{{ Str::limit($pertanyaan->isi, 50) }}</td>
                                        <td>{{ $pertanyaan->user->name }}</td>
                                        <td>{{ $pertanyaan->jawaban_tepat_id }}</td>
                                        <td>{{ $pertanyaan->poin }}</td>
                                        <td>Detail</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7">Tidak ada pertanyaan</td>    
                                </tr> 
                                @endforelse  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #END# Exportable Table -->
</div>

@endsection