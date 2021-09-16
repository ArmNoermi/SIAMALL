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
                <form method="POST" action="/mapel/{{$dt->id}}/update-mapel" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">

                        <div class="form-group {{$errors->has('kode') ? 'has-error' : ''}}">
                            <label for="kode" class="col-sm-2 control-label">Kode</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->kode}}" type="text" class="form-control" name="kode" id="kode" placeholder="Kode">
                                @if($errors->has('kode'))
                                <p class="help-block badge badge-danger">{{$errors->first('kode')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{$dt->nama}}" name="nama" id="nama" placeholder="Nama dan gelar">
                                @if($errors->has('nama'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{$errors->has('semester') ? 'has-error' : ''}}">
                            <label for="semester" class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="semester" id="semester">
                                    <option value="1" @if($dt->semester == '1') selected @endif>1</option>
                                    <option value="2" @if($dt->semester == '2') selected @endif>2</option>
                                </select>
                                @if($errors->has('semester'))
                                <p class="help-block badge badge-danger">{{$errors->first('semester')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('guru_id') ? 'has-error' : ''}}">
                            <label for="guru_id" class="col-sm-2 control-label">Guru</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="guru_id" id="guru_id">
                                    @foreach ($guru as $id => $n)
                                    <option value="{{ $id }}" <?= $id == $dt->guru_id ? "selected" : null ?>>{{ $n }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('guru_id'))
                                <p class="help-block badge badge-danger">{{$errors->first('guru_id')}}</p>
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