@extends('template')
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Buat Pertanyaan</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Form Pertanyaan
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <form action="" method="POST">
                        <label for="judul">Judul :</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="judul" name="judul" class="form-control"
                                    placeholder="Masukkan Judul" required>
                            </div>
                        </div>
                        <label for="isi">Isi :</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="isi" name="isi" class="form-control"
                                    placeholder="Masukkan Isi" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Submit">
                        <!-- <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
