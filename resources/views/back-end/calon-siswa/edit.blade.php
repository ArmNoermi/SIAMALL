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
                    <li class="breadcrumb-item"><a href="/calon-siswa">Calon Siswa</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Pendaftaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form method="POST" action="{{ url('calon-siswa/update/' . $dt->id ) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('nisn') ? 'has-error' : ''}}">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="nisn" value="{{$dt->r_biodata_user->nisn}}" placeholder="NISN">
                                @if($errors->has('nisn'))
                                <p class="help-block badge badge-danger">{{$errors->first('nisn')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{$dt->r_biodata_user->tempat_lahir}}" placeholder="Tempat Lahir">
                                @if($errors->has('tempat_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="{{$dt->r_biodata_user->tanggal_lahir}}">
                                @if($errors->has('tanggal_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" style="width: 100%;">
                                    <option value="L" @if($dt->r_biodata_user->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    <option value="P" @if($dt->r_biodata_user->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                <p class="help-block badge badge-danger">{{$errors->first('jenis_kelamin')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                                <label for="agama">Agama</label>
                                <select class="form-control select2" name="agama" id="agama" style="width: 100%;">
                                    <option value="Islam" @if($dt->r_biodata_user->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen" @if($dt->r_biodata_user->agama == 'Kristen') selected @endif>Kristen</option>
                                </select>
                                @if($errors->has('agama'))
                                <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                @endif
                            </div>


                            <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat ...">{{$dt->r_biodata_user->alamat}}</textarea>
                                @if($errors->has('alamat'))
                                <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('ijazah') ? 'has-error' : ''}}">
                                <div class="form_title">Ijazah</div>
                                <input type="file" name="ijazah" class="form-control">
                                <span>{{$dt->r_biodata_user->ijazah}}</span>
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
                                    <input type="text" class="form-control" value="{{$dt->id_registrasi}}" name="id_registrasi" id="id_registrasi" disabled placeholder="ID Registrasi">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{$dt->name}}" name="nama" id="nama" placeholder="Nama Lengkap">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{$dt->email}}" name="email" id="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" class="form-control" value="{{$dt->no_hp}}" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                                </div>
                            </div>

                            <!-- /.form-group -->
                            <label>Pas Foto</label>
                            <div class="form-group">
                                <img src="{{$dt->getPhoto()}}" width="110px" height="150px" alt="">
                                <div>
                                    <input type="file" name="photo">
                                </div>
                                <span>{{$dt->photo}}</span>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update</button>
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
@endsection