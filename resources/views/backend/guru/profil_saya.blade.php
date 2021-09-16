@extends('backend.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{$title}}
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <center>
                        <img class="profile-user-img " height="140px" src="{{$dt->getPhoto()}}" alt="User profile picture">
                    </center>
                    <h3 class="profile-username text-center">{{$dt->name}}</h3>

                    <p class="text-muted text-center">{{$dt->email}}</p>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tentang</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-barcode margin-r-5"></i> NIP</strong>

                    <p class="text-muted">
                        {{$dt->r_guru_user->nip}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-calendar margin-r-5"></i> Tempat / Tanggal Lahir</strong>

                    <p class="text-muted">
                        {{$dt->r_guru_user->tempat_lahir}} /{{$dt->r_guru_user->tanggal_lahir}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                    <p class="text-muted">{{$dt->r_guru_user->alamat}}</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>




                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#biodata" data-toggle="tab">Biodata Diri</a></li>

                    <li><a href="#ganti_password" data-toggle="tab">Ganti Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="biodata">

                        <form method="POST" action="/guru/{{$dt->id}}/update-profil" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            {{ method_field('PUT')}}
                            <div class="box-body">
                                <div class="form-group {{$errors->has('nip') ? 'has-error' : ''}}">
                                    <label for="nip" class="col-sm-2 control-label">NIP</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_guru_user->nip}}" type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
                                        @if($errors->has('nip'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nip')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$dt->name}}" name="name" id="name" placeholder="Nama Panggilan">
                                        @if($errors->has('name'))
                                        <p class="help-block badge badge-danger">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                                    <label for="nama" class="col-sm-2 control-label">Nickname</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$dt->r_guru_user->nama}}" name="nama" id="nama" placeholder="Nama dan gelar">
                                        @if($errors->has('nama'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                        @endif
                                    </div>
                                </div>





                                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{$dt->email}}" name="email" id="email" placeholder="Email">
                                        @if($errors->has('email'))
                                        <p class="help-block badge badge-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('no_hp') ? 'has-error' : ''}}">
                                    <label for="no_hp" class="col-sm-2 control-label">Nomor HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$dt->no_hp}}" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                                        @if($errors->has('no_hp'))
                                        <p class="help-block badge badge-danger">{{$errors->first('no_hp')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                                    <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_guru_user->tempat_lahir}}" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                                        @if($errors->has('tempat_lahir'))
                                        <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_guru_user->tanggal_lahir}}" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tempat Lahir">
                                        @if($errors->has('tanggal_lahir'))
                                        <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="L" @if($dt->r_guru_user->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if($dt->r_guru_user->jenis_kelamin == 'P') selected @endif>Perempuan</option>
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
                                            <option value="">--Pilih--</option>
                                            <option value="Islam" @if($dt->r_guru_user->agama == 'Islam') selected @endif>Islam</option>
                                            <option value="Kristen Protestan" @if($dt->r_guru_user->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                            <option value="Kristen Katolik" @if($dt->r_guru_user->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                            <option value="Hindu" @if($dt->r_guru_user->agama == 'Hindu') selected @endif>Hindu</option>
                                            <option value="Budha" @if($dt->r_guru_user->agama == 'Budha') selected @endif>Budha</option>
                                            <option value="Konghuchu" @if($dt->r_guru_user->agama == 'Konghuchu') selected @endif>Konghuchu</option>

                                        </select>
                                        @if($errors->has('agama'))
                                        <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat">{{$dt->r_guru_user->alamat}}</textarea>
                                        @if($errors->has('alamat'))
                                        <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group {{$errors->has('photo') ? 'has-error' : ''}}">
                                    <label class="col-sm-2 control-label">Pas Foto</label>
                                    <div class="col-sm-10">

                                        <input type="file" name="photo">
                                        <span>{{$dt->photo}}</span>
                                        @if($errors->has('photo'))
                                        <p class="help-block badge badge-danger">{{$errors->first('photo')}}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">

                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-edit"></i> Update</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>


                    </div>
                    <!-- /.tab-pane -->


                    <div class="tab-pane" id="ganti_password">
                        <form role="form" method="POST" action="{{route('guru.ganti_password',$dt->id)}}">

                            <div class="modal-body">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input value="{{$dt->name}}" type="text" disabled class="form-control" id="name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input value="{{$dt->email}}" type="email" name="email" class="form-control" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" aria-describedby="password">
                                        <div id="password" class="form-text"><small>Isi dengan password lama</small></div>
                                    </div>

                                </div>
                                <!-- /.box-body -->



                            </div>
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Ganti</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>
@endsection