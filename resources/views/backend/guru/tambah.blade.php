@extends('backend.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{$title}}
        <small>Input</small>
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
                <form method="POST" action="/guru/post-tambah" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">

                        <div class="form-group {{$errors->has('nip') ? 'has-error' : ''}}">
                            <label for="nip" class="col-sm-2 control-label">NIP</label>
                            <div class="col-sm-10">
                                <input value="{{old('nip')}}" type="text" class="form-control" name="nip" id="nip" placeholder="NIP">
                                @if($errors->has('nip'))
                                <p class="help-block badge badge-danger">{{$errors->first('nip')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{old('nama')}}" name="nama" id="nama" placeholder="Nama dan gelar">
                                @if($errors->has('nama'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="col-sm-2 control-label">Nickname</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{old('name')}}" name="name" id="name" placeholder="Nama Panggilan">
                                @if($errors->has('name'))
                                <p class="help-block badge badge-danger">{{$errors->first('name')}}</p>
                                @endif
                            </div>
                        </div>



                        <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Email">
                                @if($errors->has('email'))
                                <p class="help-block badge badge-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('no_hp') ? 'has-error' : ''}}">
                            <label for="no_hp" class="col-sm-2 control-label">Nomor HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{old('no_hp')}}" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                                @if($errors->has('no_hp'))
                                <p class="help-block badge badge-danger">{{$errors->first('no_hp')}}</p>
                                @endif
                            </div>
                        </div>



                        <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                            <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input value="{{old('tempat_lahir')}}" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                                @if($errors->has('tempat_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                            <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input value="{{old('tanggal_lahir')}}" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tempat Lahir">
                                @if($errors->has('tanggal_lahir'))
                                <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                            <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="">--Pilih--</option>
                                    <option value="L" {{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
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
                                    <option value="Islam" {{(old('agama') == 'Islam') ? 'selected' : ''}}>Islam</option>
                                    <option value="Kristen Protestan" {{(old('agama') == 'Kristen Protestan') ? 'selected' : ''}}>Kristen Protestan</option>
                                    <option value="Kristen Katolik" {{(old('agama') == 'Kristen Katolik') ? 'selected' : ''}}>Kristen Katolik</option>
                                    <option value="Hindu" {{(old('agama') == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                                    <option value="Budha" {{(old('agama') == 'Budha') ? 'selected' : ''}}>Budha</option>
                                    <option value="Konghuchu" {{(old('agama') == 'Konghuchu') ? 'selected' : ''}}>Konghuchu</option>
                                </select>
                                @if($errors->has('agama'))
                                <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat">{{old('alamat')}}</textarea>
                                @if($errors->has('alamat'))
                                <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{$errors->has('photo') ? 'has-error' : ''}}">
                            <label class="col-sm-2 control-label">Pas Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control">
                                @if($errors->has('photo'))
                                <p class="help-block badge badge-danger">{{$errors->first('photo')}}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default"><i class="fa fa-undo"></i> Reset</button>
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-paper-plane"></i> Simpan</button>
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