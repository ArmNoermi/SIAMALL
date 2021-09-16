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
                    <li class="breadcrumb-item"><a href="/guru">Guru</a></li>
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
                    <form method="POST" action="/guru/post-tambah" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row {{$errors->has('nip') ? 'has-error' : ''}}">
                                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nip" id="nip" value="{{old('nip')}}" placeholder="NIP . . .">
                                    @if($errors->has('nip'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nip')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('nama') ? 'has-error' : ''}}">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{old('nama')}}" placeholder="Nama lengkap dan gelar . . .">
                                    @if($errors->has('nama'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('name') ? 'has-error' : ''}}">
                                <label for="name" class="col-sm-2 col-form-label">Nama Panggilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Nama Panggilan . . .">
                                    @if($errors->has('name'))
                                    <p class="help-block badge badge-danger">{{$errors->first('name')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('email') ? 'has-error' : ''}}">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email . . .">
                                    @if($errors->has('email'))
                                    <p class="help-block badge badge-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('no_hp') ? 'has-error' : ''}}">
                                <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{old('no_hp')}}" placeholder="Nomor HP . . .">
                                    @if($errors->has('no_hp'))
                                    <p class="help-block badge badge-danger">{{$errors->first('no_hp')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{old('tempat_lahir')}}" placeholder="Tempat Lahir . . .">
                                    @if($errors->has('tempat_lahir'))
                                    <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{old('tanggal_lahir')}}" placeholder="Tanggal Lahir . . .">
                                    @if($errors->has('tanggal_lahir'))
                                    <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" style="width: 100%;">
                                        <option value="">--Pilih--</option>
                                        <option value="L" {{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
                                        <option value="P" {{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <p class="help-block badge badge-danger">{{$errors->first('jenis_kelamin')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('agama') ? 'has-error' : ''}}">
                                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="agama" id="agama" style="width: 100%;">
                                        <option value="">--Pilih--</option>
                                        <option value="Islam" {{(old('agama') == 'Islam') ? 'selected' : ''}}>Islam</option>
                                        <option value="Kristen" {{(old('agama') == 'Kristen') ? 'selected' : ''}}>Kristen</option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('alamat') ? 'has-error' : ''}}">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat ...">{{old('alamat')}}</textarea>
                                    @if($errors->has('alamat'))
                                    <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row {{$errors->has('photo') ? 'has-error' : ''}}">
                                <label for="no_hp" class="col-sm-2 col-form-label">Pas Foto</label>
                                <div class="col-sm-10">
                                    <input type="file" name="photo" class="form-control">
                                    @if($errors->has('photo'))
                                    <p class="help-block badge badge-danger">{{$errors->first('photo')}}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="reset" class="btn btn-default float-right"><i class="fas fa-undo"></i> Reset</button>
                            <button type="submit" class="btn btn-info float-right"><i class="fas fa-paper-plane"></i> Simpan</button>
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