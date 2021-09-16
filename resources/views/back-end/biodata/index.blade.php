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

<!-- Main content -->
@if($cek < 1) <section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ url('/bio-data/'. \Auth::user()->id) . '/complete-bio' }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('nisn') ? 'has-error' : ''}}">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="nisn" value="{{old('nisn')}}" placeholder="NISN">
                                @if($errors->has('nisn'))
                                <p class="help-block badge badge-danger">{{$errors->first('nisn')}}</p>
                                @endif
                                <span>(Jika belum memiliki NISN silakan dikosongkan)</span>
                            </div>

                            <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{old('tempat_lahir')}}" placeholder="Tempat Lahir">
                                @if($errors->has('tempat_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
                                @if($errors->has('tanggal_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" style="width: 100%;">
                                    <option value="">--Pilih--</option>
                                    <option value="L" {{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                <p class="help-block badge badge-danger">{{$errors->first('jenis_kelamin')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                                <label for="agama">Agama</label>
                                <select class="form-control select2" name="agama" id="agama" style="width: 100%;">
                                    <option value="">--Pilih--</option>
                                    <option value="Islam" {{(old('agama') == 'Islam') ? 'selected' : ''}}>Islam</option>
                                    <option value="Kristen" {{(old('agama') == 'Kristen') ? 'selected' : ''}}>Kristen</option>
                                </select>
                                @if($errors->has('agama'))
                                <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat ...">{{old('alamat')}}</textarea>
                                @if($errors->has('alamat'))
                                <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('ijazah') ? 'has-error' : ''}}">
                                <div class="form_title">Ijazah</div>
                                <input type="file" name="ijazah" class="form-control">
                                @if($errors->has('ijazah'))
                                <p class="help-block badge badge-danger">{{$errors->first('ijazah')}}</p>
                                @endif
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">



                            <div class="form-group">
                                <div class="form-group">
                                    <label for="id_registrasi">ID Registrasi</label>
                                    <input type="text" class="form-control" value="{{\Auth::user()->id_registrasi}}" id="id_registrasi" disabled placeholder="ID Registrasi">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{\Auth::user()->name}}" id="nama" disabled placeholder="Nama Lengkap">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{\Auth::user()->email}}" id="email" disabled placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" class="form-control" value="{{\Auth::user()->no_hp}}" id="no_hp" disabled placeholder="Nomor Handphone">
                                </div>
                            </div>

                            <!-- /.form-group -->
                            <label>Pas Foto</label>
                            <div class="form-group">
                                <img src="{{\Auth::user()->getPhoto()}}" width="110px" height="150px" alt="">
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan</button>
                                <button type="reset" class="btn btn-default"><i class="fas fa-undo"></i> Cancel</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.row -->

            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
    </section>

    @else

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{\Auth::user()->getPhoto()}}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{\Auth::user()->name}}</h3>

                            <p class="text-muted text-center">{{\Auth::user()->email}}</p>

                            <a href="/bio-data/{{\Auth::user()->id}}/edit-bio" class="btn btn-secondary btn-block"><b>Edit Biodata</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header p-2">
                            <button type="button" class="btn btn-primary" onclick="window.open('/cetak-bukti-pendaftaran')"><i class="fas fa-sticky-note"></i> Cetak Bukti Pendaftaran</button>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{\Auth::user()->getPhoto()}}" alt="user image">
                                            <span class="username">
                                                <a href="#">{{\Auth::user()->name}}</a>

                                            </span>
                                            <span class="description">Mendaftar : {{\Auth::user()->created_at}}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <h2>
                                            <label class="label label-primary">
                                                Selamat biodata anda telah lengkap!
                                            </label>
                                        </h2>


                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->

                                </div>
                                <!-- /.tab-pane -->



                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endif
    @endsection