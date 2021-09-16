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
                <form method="GET" action="/nilai-siswa/{{$data->id}}" enctype="multipart/form-data" class="form-horizontal">

                    <div class="box-body">

                        <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input value="{{auth()->user()->name}}" type="text" class="form-control" id="nama" placeholder="Nama" disabled>
                                @if($errors->has('nama'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                @endif

                            </div>
                        </div>




                        <div class="form-group {{$errors->has('semester') ? 'has-error' : ''}}">
                            <label for="semester" class="col-sm-2 control-label">semester</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="semester" id="semester">
                                    <option value="">--Pilih--</option>
                                    @foreach($semester as $s)
                                    <option value="{{$s->id}}">{{$s->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('semester'))
                                <p class="help-block badge badge-danger">{{$errors->first('semester')}}</p>
                                @endif
                            </div>
                        </div>



                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-eye"></i> Lihat</button>
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