@extends('backend.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{$title}}
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
    </ol>
</section>

<section class="content">
    <div class="row">

        <!-- right column -->
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form {{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="/materi/{{$materi->id}}/update" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">
                        <div class="form-group {{$errors->has('judul_materi') ? 'has-error' : ''}}">
                            <label for="judul_materi" class="col-sm-2 control-label">Judul Materi</label>
                            <div class="col-sm-10">
                                <input value="{{$materi->judul_materi}}" type="text" class="form-control" name="judul_materi" id="judul_materi" placeholder="Judul Materi">
                                @if($errors->has('judul_materi'))
                                <p class="help-block badge badge-danger">{{$errors->first('judul_materi')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('mapel') ? 'has-error' : ''}}">
                            <label for="mapel" class="col-sm-2 control-label">Mata Pelajaran</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="mapel" id="mapel">
                                    @foreach($mapel as $mp)
                                    <option value="{{$mp->id}}" <?= $mp->id == $materi->mapel_id ? "selected" : null ?>>{{$mp->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mapel'))
                                <p class="help-block badge badge-danger">{{$errors->first('mapel')}}</p>
                                @endif

                            </div>
                        </div>

                        <div class="form-group {{$errors->has('file') ? 'has-error' : ''}}">
                            <label for="file" class="col-sm-2 control-label">File Materi</label>
                            <div class="col-sm-10">
                                <input value="" type="file" class="form-control" name="file" id="file">
                                <span>{{$materi->file}}</span>
                                @if($errors->has('file'))
                                <p class="help-block badge badge-danger">{{$errors->first('file')}}</p>
                                @endif
                            </div>
                        </div>



                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-edit"></i> Update</button>
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