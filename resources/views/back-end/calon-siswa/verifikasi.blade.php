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
        <!-- SELECT2 EXAMPLE -->

        <div class="col-lg-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Verifikasi</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/calon-siswa/post-verifikasi" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_registrasi" class="col-sm-3 col-form-label">ID Registrasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="id_registrasi" id="id_registrasi" value="{{$data->id_registrasi}}">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Verifikasi <i class="fas fa-check-double"></i></button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
        <!-- /.card -->
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection