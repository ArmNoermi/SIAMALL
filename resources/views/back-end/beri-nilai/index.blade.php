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
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form {{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="GET" action="/beri-nilai/penilaian" enctype="multipart/form-data" class="form-horizontal">

                        <div class="card-body">
                            <div class="form-group row {{$errors->has('nama') ? 'has-error' : ''}}">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" value="{{$data->nama}}" placeholder="Nama . . ." disabled>
                                    @if($errors->has('nama'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="form-group row {{$errors->has('mapel') ? 'has-error' : ''}}">
                                <label for="mapel" class="col-sm-2 col-form-label">Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="mapel">
                                        <option value="">--Pilih--</option>
                                        @foreach($mapel as $mp)
                                        <option value="{{$mp->id}}">{{$mp->nama}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('mapel'))
                                    <p class="help-block badge badge-danger">{{$errors->first('mapel')}}</p>
                                    @endif
                                </div>
                            </div> -->

                            <div class="form-group row {{$errors->has('kelas') ? 'has-error' : ''}}">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option value="">--Pilih--</option>
                                        @foreach($kelas as $kl)
                                        <option value="{{$kl->id}}">{{$kl->nama_kelas}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('kelas'))
                                    <p class="help-block badge badge-danger">{{$errors->first('kelas')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('semester') ? 'has-error' : ''}}">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fas fa-eye"></i> Lihat</button>
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