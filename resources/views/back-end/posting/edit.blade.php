@extends('back-end.layout.master')

@section('head')
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@stop

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="/posts">Posting</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form {{$title}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="/posts/{{$dt->id}}/update" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                                <label for="title">Judul Berita</label>
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input type="text" class="form-control" name="title" id="title" value="{{$dt->title}}" placeholder="Judul Berita">
                                @if($errors->has('title'))
                                <p class="help-block badge badge-danger">{{$errors->first('title')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('highlight') ? 'has-error' : ''}}">
                                <label for="highlight">Highlight Berita</label>
                                <input type="text" class="form-control" name="highlight" id="highlight" value="{{$dt->highlight}}" placeholder="Highlight Berita">
                                @if($errors->has('highlight'))
                                <p class="help-block badge badge-danger">{{$errors->first('highlight')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('konten') ? 'has-error' : ''}}">
                                <label for="konten">Konten</label>
                                <textarea class="form-control" name="konten" id="konten" rows="5">{!!$dt->konten!!}</textarea>
                                @if($errors->has('konten'))
                                <p class="help-block badge badge-danger">{{$errors->first('konten')}}</p>
                                @endif
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-3">

                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Thumbnail Berita</label>
                                <div class="form-group {{$errors->has('thumbnail') ? 'has-error' : ''}}">
                                    <img src="{{$dt->thumbnail()}}" width="110px" height="150px" alt="">
                                    <div>
                                        <input type="file" name="thumbnail">
                                    </div>
                                    @if($errors->has('thumbnail'))
                                    <p class="help-block badge badge-danger">{{$errors->first('thumbnail')}}</p>
                                    @endif
                                </div>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                                <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Reset</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.row -->


            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

@section('foot')
<script src="{{asset('/back-end/dist/js/ckeditor.js')}}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#konten'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection