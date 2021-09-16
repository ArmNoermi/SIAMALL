@extends('backend.layout.master')

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
        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form {{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="/mapel/post-tambah" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">

                        <div class="form-group {{$errors->has('kode') ? 'has-error' : ''}}">
                            <label for="kode" class="col-sm-2 control-label">Kode</label>
                            <div class="col-sm-10">
                                <input value="{{old('kode')}}" type="text" class="form-control" name="kode" id="kode" placeholder="Kode">
                                @if($errors->has('kode'))
                                <p class="help-block badge badge-danger">{{$errors->first('kode')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{old('nama')}}" name="nama" id="nama" placeholder="Nama dan gelar">
                                @if($errors->has('nama'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{$errors->has('semester') ? 'has-error' : ''}}">
                            <label for="semester" class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="semester" id="semester">
                                    <option value="">--Pilih--</option>
                                    <option value="1" {{(old('semester') == '1') ? 'selected' : ''}}>Semester 1</option>
                                    <option value="2" {{(old('semester') == '2') ? 'selected' : ''}}>Semester 2</option>
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
                                    <option value="">--Pilih--</option>
                                    @foreach ($guru as $id => $n)
                                    <option value="{{ $id }}">{{ $n }}</option>
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