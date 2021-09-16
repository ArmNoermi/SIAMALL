@extends('backend.layout.master')

@section('content')
<section class="content-header">
    <h1>
        {{$title}}
        <small>Update</small>
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
                <form method="POST" action="/calon-siswa/{{$dt->id}}/post-export" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Pas Foto</label>
                            <div class="col-sm-10">
                                <img src="{{$dt->getPhoto()}}" width="110px" height="150px" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_registrasi" class="col-sm-2 control-label">ID Registrasi</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->id_registrasi}}" type="text" class="form-control" name="id_registrasi" id="id_registrasi" placeholder="ID Registrasi" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->name}}" type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->email}}" type="email" class="form-control" name="email" id="email" placeholder="Email" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_hp" class="col-sm-2 control-label">Nomor HP</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->no_hp}}" type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Handphone" disabled>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('users') ? 'has-error' : ''}}">
                            <label for="users" class="col-sm-2 control-label">ID User</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->r_biodata_user->users}}" type="text" class="form-control" name="users" id="users" placeholder="ID User">
                                @if($errors->has('users'))
                                <p class="help-block badge badge-danger">{{$errors->first('users')}}</p>
                                @endif
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nisn') ? 'has-error' : ''}}">
                            <label for="nisn" class="col-sm-2 control-label">NISN</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->r_biodata_user->nisn}}" type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN">
                                @if($errors->has('nisn'))
                                <p class="help-block badge badge-danger">{{$errors->first('nisn')}}</p>
                                @endif
                                <span></span>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                            <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->r_biodata_user->tempat_lahir}}" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                                @if($errors->has('tempat_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                            <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input value="{{$dt->r_biodata_user->tanggal_lahir}}" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tempat Lahir">
                                @if($errors->has('tanggal_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="L" @if($dt->r_biodata_user->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                    <option value="P" @if($dt->r_biodata_user->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                                @if($errors->has('jenis_kelamin'))
                                <p class="help-block badge badge-danger">{{$errors->first('jenis_kelamin')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('agama') ? 'has-error' : ''}}">
                            <label for="agama" class="col-sm-2 control-label">Agama</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="agama" id="agama">
                                    <option value="Islam" @if($dt->r_biodata_user->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen Protestan" @if($dt->r_biodata_user->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                    <option value="Kristen Katolik" @if($dt->r_biodata_user->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                    <option value="Hindu" @if($dt->r_biodata_user->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Budha" @if($dt->r_biodata_user->agama == 'Budha') selected @endif>Budha</option>
                                    <option value="Khonghucu" @if($dt->r_biodata_user->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                                </select>
                                @if($errors->has('agama'))
                                <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat">{{$dt->r_biodata_user->alamat}}</textarea>
                                @if($errors->has('alamat'))
                                <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('ijazah') ? 'has-error' : ''}}">
                            <label for="ijazah" class="col-sm-2 control-label">Ijazah</label>
                            <div class="col-sm-10">
                                <input type="text" name="ijazah" value="{{$dt->r_biodata_user->ijazah}}" class="form-control">

                                @if($errors->has('ijazah'))
                                <p class="help-block badge badge-danger">{{$errors->first('ijazah')}}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-arrow-right"></i> Export</button>
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