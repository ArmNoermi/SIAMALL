@extends('backend.layout.master')

@section('head')
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@stop

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{$title}}
        <small>Input</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form {{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{route('post.create')}}" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">

                        <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
                            <label for="title" class="col-sm-2 control-label">Judul Berita</label>
                            <div class="col-sm-10">
                                <input value="{{old('title')}}" type="text" class="form-control" name="title" id="title" placeholder="Judul Berita">
                                @if($errors->has('title'))
                                <p class="help-block badge badge-danger">{{$errors->first('title')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('highlight') ? 'has-error' : ''}}">
                            <label for="highlight" class="col-sm-2 control-label">Highlight Berita</label>
                            <div class="col-sm-10">
                                <input value="{{old('highlight')}}" type="text" class="form-control" name="highlight" id="highlight" placeholder="Highlight Berita">
                                @if($errors->has('highlight'))
                                <p class="help-block badge badge-danger">{{$errors->first('highlight')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('thumbnail') ? 'has-error' : ''}}">
                            <label for="thumbnail" class="col-sm-2 control-label">thumbnail Berita</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="thumbnail">
                                @if($errors->has('thumbnail'))
                                <p class="help-block badge badge-danger">{{$errors->first('thumbnail')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('konten') ? 'has-error' : ''}}">
                            <label for="konten" class="col-sm-2 control-label">Konten</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="konten" id="konten" rows="5">{{old('konten')}}</textarea>
                                @if($errors->has('konten'))
                                <p class="help-block badge badge-danger">{{$errors->first('konten')}}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-paper-plane"></i> Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('foot')
<script src="{{asset('/back-end/dist/js/ckeditor.js')}}"></script>
<!-- <script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script> -->

<script>
    ClassicEditor
        .create(document.querySelector('#konten'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection