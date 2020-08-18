@extends('layouts.master')
@section('title', 'Buat Pertanyaan')
@push('script-tinymce')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>Buat Pertanyaan Baru</h3>
            <div class="card">
                <div class="body">
                    <form action="/pertanyaan" method="post">
                        @csrf
                        <input type="hidden" value="{{ $user_id }}" name="user_id">
                        <div class="form-gorup">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" value="{{ old('judul', '') }}">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea name="isi" class="form-control my-editor">{!! old('isi', '') !!}</textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-custom')
<script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
@endpush