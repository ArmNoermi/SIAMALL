@extends('back-end.layout.master')

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
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form {{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="GET" action="/nilai-siswa/{{$data->id}}" enctype="multipart/form-data" class="form-horizontal">

                        <div class="card-body">
                            <div class="form-group row {{$errors->has('nama') ? 'has-error' : ''}}">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" value="{{auth()->user()->name}}" placeholder="Nama . . ." disabled>
                                    @if($errors->has('nama'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('kelas') ? 'has-error' : ''}}">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kelas" value="{{$data->kelas->nama_kelas}}" placeholder="Kelas . . ." disabled>
                                    @if($errors->has('kelas'))
                                    <p class="help-block badge badge-danger">{{$errors->first('kelas')}}</p>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row {{$errors->has('semester') ? 'has-error' : ''}}">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="semester" id="semester" style="width: 100%;">
                                        <option value="">--Pilih--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                    @if($errors->has('semester'))
                                    <p class="help-block badge badge-danger">{{$errors->first('semester')}}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-eye"></i> Lihat</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

</section>
@endsection