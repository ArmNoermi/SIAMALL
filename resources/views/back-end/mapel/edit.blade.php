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
                    <li class="breadcrumb-item"><a href="/mapel">Mata Pelajaran</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form {{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/mapel/{{$dt->id}}/update-mapel" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row {{$errors->has('kode') ? 'has-error' : ''}}">
                                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode" id="kode" value="{{$dt->kode}}" placeholder="Kode . . .">
                                    @if($errors->has('kode'))
                                    <p class="help-block badge badge-danger">{{$errors->first('kode')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('nama') ? 'has-error' : ''}}">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{$dt->nama}}" placeholder="Nama . . .">
                                    @if($errors->has('nama'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('semester') ? 'has-error' : ''}}">
                                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="semester" id="semester" style="width: 100%;">
                                        <option value="Genap" @if($dt->semester == 'Genap') selected @endif>Genap</option>
                                        <option value="Ganjil" @if($dt->semester == 'Ganjil') selected @endif>Ganjil</option>
                                    </select>
                                    @if($errors->has('semester'))
                                    <p class="help-block badge badge-danger">{{$errors->first('semester')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('guru_id') ? 'has-error' : ''}}">
                                <label for="guru_id" class="col-sm-2 col-form-label">Guru</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="guru_id" id="guru_id" style="width: 100%;">
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
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info float-right"><i class="fas fa-edit"></i> Update</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection