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
                    <li class="breadcrumb-item"><a href="/siswa">Siswa</a></li>
                    <li class="breadcrumb-item"><a href="#">Profil</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form {{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="{{$siswa->r_user_siswa->name}}" disabled placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <input type="text" class="form-control" id="mapel" value="{{$siswa->mapel->pivot->nilai}}" placeholder="mapel">
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select class="form-control select2" id="semester" style="width: 100%;">
                                    <option value="">--Pilih--</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

</section>
@endsection