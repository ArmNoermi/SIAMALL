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
                    <strong><i class="fa fa-barcode margin-r-5"></i> Nomor Induk Siswa Nasional</strong>

                    <p class="text-muted">
                        {{$dt->r_siswa_user->nisn}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-calendar margin-r-5"></i> Tempat / Tanggal Lahir</strong>

                    <p class="text-muted">
                        {{$dt->r_siswa_user->tempat_lahir}} /{{$dt->r_siswa_user->tanggal_lahir}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

                    <p class="text-muted">{{$dt->r_siswa_user->alamat}}</p>

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

                        <form method="POST" action="/siswa/{{$dt->id}}/update-profil" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            {{ method_field('PUT')}}
                            <div class="box-body">

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

                                <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$dt->name}}" name="nama" id="nama" placeholder="Nama Lengkap">
                                        @if($errors->has('nama'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('nama_panggilan') ? 'has-error' : ''}}">
                                    <label for="nama_panggilan" class="col-sm-2 control-label">Nama Panggilan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$dt->r_siswa_user->nama_panggilan}}" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan">
                                        @if($errors->has('nama_panggilan'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nama_panggilan')}}</p>
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

                                <div class="form-group {{$errors->has('nisn') ? 'has-error' : ''}}">
                                    <label for="nisn" class="col-sm-2 control-label">NISN</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->nisn}}" type="number" class="form-control" name="nisn" id="nisn" placeholder="NISN">
                                        @if($errors->has('nisn'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nisn')}}</p>
                                        @endif
                                        <span>(Jika belum memiliki NISN silakan dikosongkan)</span>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' : ''}}">
                                    <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->tempat_lahir}}" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
                                        @if($errors->has('tempat_lahir'))
                                        <p class="help-block badge badge-danger">{{$errors->first('tempat_lahir')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->tanggal_lahir}}" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tempat Lahir">
                                        @if($errors->has('tanggal_lahir'))
                                        <p class="help-block badge badge-danger">{{$errors->first('tanggal_lahir')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                    <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="L" @if($dt->r_siswa_user->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                            <option value="P" @if($dt->r_siswa_user->jenis_kelamin == 'P') selected @endif>Perempuan</option>
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
                                            <option value="Islam" @if($dt->r_siswa_user->agama == 'Islam') selected @endif>Islam</option>
                                            <option value="Kristen Protestan" @if($dt->r_siswa_user->agama == 'Kristen Protestan') selected @endif>Kristen Protestan</option>
                                            <option value="Kristen Katolik" @if($dt->r_siswa_user->agama == 'Kristen Katolik') selected @endif>Kristen Katolik</option>
                                            <option value="Hindu" @if($dt->r_siswa_user->agama == 'Hindu') selected @endif>Hindu</option>
                                            <option value="Budha" @if($dt->r_siswa_user->agama == 'Budha') selected @endif>Budha</option>
                                            <option value="Khonghucu" @if($dt->r_siswa_user->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                                        </select>
                                        @if($errors->has('agama'))
                                        <p class="help-block badge badge-danger">{{$errors->first('agama')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('alamat') ? 'has-error' : ''}}">
                                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat" id="alamat" rows="5" placeholder="Alamat">{{$dt->r_siswa_user->alamat}}</textarea>
                                        @if($errors->has('alamat'))
                                        <p class="help-block badge badge-danger">{{$errors->first('alamat')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('asal_sekolah') ? 'has-error' : ''}}">
                                    <label for="asal_sekolah" class="col-sm-2 control-label">Asal Sekolah</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->asal_sekolah}}" type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah">
                                        @if($errors->has('asal_sekolah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('asal_sekolah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('alamat_asal_sekolah') ? 'has-error' : ''}}">
                                    <label for="alamat_asal_sekolah" class="col-sm-2 control-label">Alamat Asal Sekolah</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat_asal_sekolah" id="alamat_asal_sekolah" rows="5" placeholder="Alamat Asal Sekolah">{{$dt->r_siswa_user->alamat_asal_sekolah}}</textarea>
                                        @if($errors->has('alamat_asal_sekolah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('alamat_asal_sekolah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('anak_ke') ? 'has-error' : ''}}">
                                    <label for="anak_ke" class="col-sm-2 control-label">Anak Ke</label>
                                    <div class="col-sm-3">
                                        <input value="{{$dt->r_siswa_user->anak_ke}}" type="number" class="form-control" name="anak_ke" id="anak_ke" placeholder="Contoh: 1">
                                        @if($errors->has('anak_ke'))
                                        <p class="help-block badge badge-danger">{{$errors->first('anak_ke')}}</p>
                                        @endif
                                        <small>(Isi dengan angka)</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('jumlah_saudara') ? 'has-error' : ''}}">
                                    <label for="jumlah_saudara" class="col-sm-2 control-label">Jumlah Saudara</label>
                                    <div class="col-sm-3">
                                        <input value="{{$dt->r_siswa_user->jumlah_saudara}}" type="number" class="form-control" name="jumlah_saudara" id="jumlah_saudara" placeholder="Contoh: 1">
                                        @if($errors->has('jumlah_saudara'))
                                        <p class="help-block badge badge-danger">{{$errors->first('jumlah_saudara')}}</p>
                                        @endif
                                        <small>(Isi dengan angka)</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('telp_rumah') ? 'has-error' : ''}}">
                                    <label for="telp_rumah" class="col-sm-2 control-label">Telepon Rumah</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->telp_rumah}}" type="number" class="form-control" name="telp_rumah" id="telp_rumah" placeholder="Telepon Rumah">
                                        @if($errors->has('telp_rumah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('telp_rumah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('provinsi') ? 'has-error' : ''}}">
                                    <label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->provinsi}}" type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
                                        @if($errors->has('provinsi'))
                                        <p class="help-block badge badge-danger">{{$errors->first('provinsi')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('kabupaten') ? 'has-error' : ''}}">
                                    <label for="kabupaten" class="col-sm-2 control-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->kabupaten}}" type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten">
                                        @if($errors->has('kabupaten'))
                                        <p class="help-block badge badge-danger">{{$errors->first('kabupaten')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('kecamatan') ? 'has-error' : ''}}">
                                    <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->kecamatan}}" type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
                                        @if($errors->has('kecamatan'))
                                        <p class="help-block badge badge-danger">{{$errors->first('kecamatan')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('kode_pos') ? 'has-error' : ''}}">
                                    <label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input value="{{$dt->r_siswa_user->kode_pos}}" type="number" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
                                        @if($errors->has('kode_pos'))
                                        <p class="help-block badge badge-danger">{{$errors->first('kode_pos')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('golongan_darah') ? 'has-error' : ''}}">
                                    <label for="golongan_darah" class="col-sm-2 control-label">Golongan Darah</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="golongan_darah" id="golongan_darah">
                                            <option value="A" @if($dt->r_siswa_user->golongan_darah == 'A') selected @endif>A</option>
                                            <option value="B" @if($dt->r_siswa_user->golongan_darah == 'B') selected @endif>B</option>
                                            <option value="O" @if($dt->r_siswa_user->golongan_darah == 'O') selected @endif>O</option>
                                            <option value="AB" @if($dt->r_siswa_user->golongan_darah == 'AB') selected @endif>AB</option>
                                        </select>
                                        @if($errors->has('golongan_darah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('golongan_darah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('tinggi_badan') ? 'has-error' : ''}}">
                                    <label for="tinggi_badan" class="col-sm-2 control-label">Tinggi Badan</label>
                                    <div class="col-sm-3">
                                        <input value="{{$dt->r_siswa_user->tinggi_badan}}" type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan">
                                        @if($errors->has('tinggi_badan'))
                                        <p class="help-block badge badge-danger">{{$errors->first('tinggi_badan')}}</p>
                                        @endif
                                    </div>
                                    <label for="tinggi_badan" class="col-sm-1 control-label">cm</label>
                                </div>

                                <div class="form-group {{$errors->has('berat_badan') ? 'has-error' : ''}}">
                                    <label for="berat_badan" class="col-sm-2 control-label">Berat Badan</label>
                                    <div class="col-sm-3">
                                        <input value="{{$dt->r_siswa_user->berat_badan}}" type="number" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan">
                                        @if($errors->has('berat_badan'))
                                        <p class="help-block badge badge-danger">{{$errors->first('berat_badan')}}</p>
                                        @endif
                                    </div>
                                    <label for="berat_badan" class="col-sm-1 control-label">kg</label>
                                </div>

                                <!-- <div class="form-group {{$errors->has('tgl_mendaftar') ? 'has-error' : ''}}">
                            <label for="tgl_mendaftar" class="col-sm-2 control-label">Tanggal Mendaftar</label>
                            <div class="col-sm-10">
                                <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="tgl_mendaftar" id="tgl_mendaftar" placeholder="Tanggal Mendaftar">
                                @if($errors->has('tgl_mendaftar'))
                                <p class="help-block badge badge-danger">{{$errors->first('tgl_mendaftar')}}</p>
                                @endif
                                <small>( Bulan / Tanggal / Tahun )</small>
                            </div>
                        </div> -->

                                <div class="form-group {{$errors->has('ket_riwayat_penyakit') ? 'has-error' : ''}}">
                                    <label for="ket_riwayat_penyakit" class="col-sm-2 control-label">Riwayat Penyakit Dan Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="ket_riwayat_penyakit" id="ket_riwayat_penyakit" rows="5" placeholder="Jelaskan riwayat penyakit anda beserta keterangannya">{{$dt->r_siswa_user->ket_riwayat_penyakit}}</textarea>
                                        @if($errors->has('ket_riwayat_penyakit'))
                                        <p class="help-block badge badge-danger">{{$errors->first('ket_riwayat_penyakit')}}</p>
                                        @endif
                                        <small>(Silakan dokosongkan jika anda tidak memiliki riwayat penyakit yang membutuhkan perawatan khusus)</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('status_anak') ? 'has-error' : ''}}">
                                    <label for="status_anak" class="col-sm-2 control-label">Status Anak</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status_anak" id="status_anak">
                                            <option value="1" @if($dt->r_siswa_user->status_anak == '1') selected @endif>Yatim dan Piatu</option>
                                            <option value="2" @if($dt->r_siswa_user->status_anak == '2') selected @endif>Yatim</option>
                                            <option value="3" @if($dt->r_siswa_user->status_anak == '3') selected @endif>Piatu</option>
                                            <option value="4" @if($dt->r_siswa_user->status_anak == '4') selected @endif>Keluarga Utuh</option>

                                        </select>
                                        @if($errors->has('status_anak'))
                                        <p class="help-block badge badge-danger">{{$errors->first('status_anak')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('status_orang_tua') ? 'has-error' : ''}}">
                                    <label for="status_orang_tua" class="col-sm-2 control-label">Status Orang Tua</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status_orang_tua" id="status_orang_tua">
                                            <option value="Bersama" @if($dt->r_siswa_user->status_orang_tua == 'Bersama') selected @endif>Bersama</option>
                                            <option value="Cerai" @if($dt->r_siswa_user->status_orang_tua == 'Cerai') selected @endif>Cerai</option>


                                        </select>
                                        @if($errors->has('status_orang_tua'))
                                        <p class="help-block badge badge-danger">{{$errors->first('status_orang_tua')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('status_asuh') ? 'has-error' : ''}}">
                                    <label for="status_asuh" class="col-sm-2 control-label">Status Asuh</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status_asuh" id="status_asuh">
                                            <option value="Diasuh ayah dan ibu" @if($dt->r_siswa_user->status_asuh == 'Diasuh ayah dan ibu') selected @endif>Diasuh ayah dan ibu</option>
                                            <option value="Diasuh ayah" @if($dt->r_siswa_user->status_asuh == 'Diasuh ayah') selected @endif>Diasuh ayah</option>
                                            <option value="Diasuh ibu" @if($dt->r_siswa_user->status_asuh == 'Diasuh ibu') selected @endif>Diasuh ibu</option>
                                            <option value="Diasuh wali" @if($dt->r_siswa_user->status_asuh == 'Diasuh wali') selected @endif>Diasuh wali</option>

                                        </select>
                                        @if($errors->has('status_asuh'))
                                        <p class="help-block badge badge-danger">{{$errors->first('status_asuh')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('ijazah') ? 'has-error' : ''}}">
                                    <label for="ijazah" class="col-sm-2 control-label">Ijazah</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="ijazah" class="form-control">
                                        <span>{{$dt->r_siswa_user->ijazah}}</span>
                                        @if($errors->has('ijazah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('ijazah')}}</p>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->


                            <div class="box-header with-border">
                                <h3 class="box-title">Form Data Orang Tua / Wali</h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group {{$errors->has('nama_ayah') ? 'has-error' : ''}}">
                                    <label for="nama_ayah" class="col-sm-2 control-label">Nama Ayah</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->nama_ayah}}" type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah">
                                        @if($errors->has('nama_ayah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nama_ayah')}}</p>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('penghasilan_ayah') ? 'has-error' : ''}}">
                                    <label for="penghasilan_ayah" class="col-sm-2 control-label">Penghasilan Ayah Rp.</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->penghasilan_ayah}}" type="number" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" placeholder="Penghasilan Ayah">
                                        @if($errors->has('penghasilan_ayah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('penghasilan_ayah')}}</p>
                                        @endif
                                        <small>( Diisi dengan angka)</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('pendidikan_ayah') ? 'has-error' : ''}}">
                                    <label for="pendidikan_ayah" class="col-sm-2 control-label">Jenjang Pendidikan Ayah</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->pendidikan_ayah}}" type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" placeholder="Pendidikan Ayah">
                                        @if($errors->has('pendidikan_ayah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('pendidikan_ayah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('pekerjaan_ayah') ? 'has-error' : ''}}">
                                    <label for="pekerjaan_ayah" class="col-sm-2 control-label">Pekerjaan Ayah</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->pekerjaan_ayah}}" type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
                                        @if($errors->has('pekerjaan_ayah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('pekerjaan_ayah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('no_hp_ayah') ? 'has-error' : ''}}">
                                    <label for="no_hp_ayah" class="col-sm-2 control-label">Nomor HP Ayah</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->no_hp_ayah}}" type="text" class="form-control" name="no_hp_ayah" id="no_hp_ayah" placeholder="Nomor HP Ayah">
                                        @if($errors->has('no_hp_ayah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('no_hp_ayah')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('alamat_ayah') ? 'has-error' : ''}}">
                                    <label for="alamat_ayah" class="col-sm-2 control-label">Alamat Ayah</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" rows="5" placeholder="Alamat Ayah">{{$orang_tua->alamat_ayah}}</textarea>
                                        @if($errors->has('alamat_ayah'))
                                        <p class="help-block badge badge-danger">{{$errors->first('alamat_ayah')}}</p>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('nama_ibu') ? 'has-error' : ''}}">
                                    <label for="nama_ibu" class="col-sm-2 control-label">Nama Ibu</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->nama_ibu}}" type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                                        @if($errors->has('nama_ibu'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nama_ibu')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('penghasilan_ibu') ? 'has-error' : ''}}">
                                    <label for="penghasilan_ibu" class="col-sm-2 control-label">Penghasilan Ibu Rp.</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->penghasilan_ibu}}" type="number" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" placeholder="Penghasilan Ibu">
                                        @if($errors->has('penghasilan_ibu'))
                                        <p class="help-block badge badge-danger">{{$errors->first('penghasilan_ibu')}}</p>
                                        @endif
                                        <small>( Diisi dengan angka)</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('pendidikan_ibu') ? 'has-error' : ''}}">
                                    <label for="pendidikan_ibu" class="col-sm-2 control-label">Jenjang Pendidikan Ibu</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->pendidikan_ibu}}" type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" placeholder="Pendidikan Ibu">
                                        @if($errors->has('pendidikan_ibu'))
                                        <p class="help-block badge badge-danger">{{$errors->first('pendidikan_ibu')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('pekerjaan_ibu') ? 'has-error' : ''}}">
                                    <label for="pekerjaan_ibu" class="col-sm-2 control-label">Pekerjaan Ibu</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->pekerjaan_ibu}}" type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu">
                                        @if($errors->has('pekerjaan_ibu'))
                                        <p class="help-block badge badge-danger">{{$errors->first('pekerjaan_ibu')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('no_hp_ibu') ? 'has-error' : ''}}">
                                    <label for="no_hp_ibu" class="col-sm-2 control-label">Nomor HP Ibu</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->no_hp_ibu}}" type="text" class="form-control" name="no_hp_ibu" id="no_hp_ibu" placeholder="Nomor HP Ibu">
                                        @if($errors->has('no_hp_ibu'))
                                        <p class="help-block badge badge-danger">{{$errors->first('no_hp_ibu')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('alamat_ibu') ? 'has-error' : ''}}">
                                    <label for="alamat_ibu" class="col-sm-2 control-label">Alamat Ibu</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" rows="5" placeholder="Alamat Ibu">{{$orang_tua->alamat_ibu}}</textarea>
                                        @if($errors->has('alamat_ibu'))
                                        <p class="help-block badge badge-danger">{{$errors->first('alamat_ibu')}}</p>
                                        @endif
                                        <small>( Jika ibu serumah dengan ayah maka boleh dikosongkan )</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('nama_wali') ? 'has-error' : ''}}">
                                    <label for="nama_wali" class="col-sm-2 control-label">Nama Wali</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->nama_wali}}" type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali">
                                        @if($errors->has('nama_wali'))
                                        <p class="help-block badge badge-danger">{{$errors->first('nama_wali')}}</p>
                                        @endif
                                        <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('penghasilan_wali') ? 'has-error' : ''}}">
                                    <label for="penghasilan_wali" class="col-sm-2 control-label">Penghasilan Wali Rp.</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->penghasilan_wali}}" type="number" class="form-control" name="penghasilan_wali" id="penghasilan_wali" placeholder="Penghasilan Wali">
                                        @if($errors->has('penghasilan_wali'))
                                        <p class="help-block badge badge-danger">{{$errors->first('penghasilan_wali')}}</p>
                                        @endif
                                        <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('pendidikan_wali') ? 'has-error' : ''}}">
                                    <label for="pendidikan_wali" class="col-sm-2 control-label">Jenjang Pendidikan Wali</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->pendidikan_wali}}" type="text" class="form-control" name="pendidikan_wali" id="pendidikan_wali" placeholder="Pendidikan Wali">
                                        @if($errors->has('pendidikan_wali'))
                                        <p class="help-block badge badge-danger">{{$errors->first('pendidikan_wali')}}</p>
                                        @endif
                                        <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('pekerjaan_wali') ? 'has-error' : ''}}">
                                    <label for="pekerjaan_wali" class="col-sm-2 control-label">Pekerjaan Wali</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->pekerjaan_wali}}" type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali">
                                        @if($errors->has('pekerjaan_wali'))
                                        <p class="help-block badge badge-danger">{{$errors->first('pekerjaan_wali')}}</p>
                                        @endif
                                        <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('no_hp_wali') ? 'has-error' : ''}}">
                                    <label for="no_hp_wali" class="col-sm-2 control-label">Nomor HP Wali</label>
                                    <div class="col-sm-10">
                                        <input value="{{$orang_tua->no_hp_wali}}" type="text" class="form-control" name="no_hp_wali" id="no_hp_wali" placeholder="Nomor HP Wali">
                                        @if($errors->has('no_hp_wali'))
                                        <p class="help-block badge badge-danger">{{$errors->first('no_hp_wali')}}</p>
                                        @endif
                                        <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                    </div>
                                </div>

                                <div class="form-group {{$errors->has('alamat_wali') ? 'has-error' : ''}}">
                                    <label for="alamat_wali" class="col-sm-2 control-label">Alamat Wali</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alamat_wali" id="alamat_wali" rows="5" placeholder="Alamat Wali">{{$orang_tua->alamat_wali}}</textarea>
                                        @if($errors->has('alamat_wali'))
                                        <p class="help-block badge badge-danger">{{$errors->first('alamat_wali')}}</p>
                                        @endif
                                        <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">

                                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-edit"></i> Update</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>


                    </div>
                    <!-- /.tab-pane -->


                    <div class="tab-pane" id="ganti_password">
                        <form role="form" method="POST" action="{{route('ganti_password',$dt->id)}}">

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
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password Lama" aria-describedby="password">
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
<!-- /.content -->
@endsection