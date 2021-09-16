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

@if($cek < 1) <!-- Main content -->

    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('complete_bio', \Auth::user()->id) }}" enctype="multipart/form-data" class="form-horizontal">
                        <div class="box-header with-border">
                            <h3 class="box-title">Form {{$title}}</h3>
                            <div class="pull-right">


                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ganti-password">
                                    Ganti Password
                                </button>


                            </div>
                        </div>
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pas Foto</label>
                                <div class="col-sm-10">
                                    <img src="{{\Auth::user()->getPhoto()}}" width="110px" height="150px" alt="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="id_registrasi" class="col-sm-2 control-label">ID Registrasi</label>
                                <div class="col-sm-10">
                                    <input value="{{\Auth::user()->id_registrasi}}" type="text" class="form-control" id="id_registrasi" placeholder="ID Registrasi" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input value="{{\Auth::user()->name}}" type="text" class="form-control" id="name" placeholder="Nama Lengkap" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_panggilan" class="col-sm-2 control-label">Nama Panggilan</label>
                                <div class="col-sm-10">
                                    <input value="{{old('nama_panggilan')}}" type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input value="{{\Auth::user()->email}}" type="email" class="form-control" id="email" placeholder="Email" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="no_hp" class="col-sm-2 control-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input value="{{\Auth::user()->no_hp}}" type="number" class="form-control" id="no_hp" placeholder="Nomor Handphone" disabled>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('nisn') ? 'has-error' : ''}}">
                                <label for="nisn" class="col-sm-2 control-label">NISN</label>
                                <div class="col-sm-10">
                                    <input value="{{old('nisn')}}" type="number" class="form-control" name="nisn" id="nisn" placeholder="NISN">
                                    @if($errors->has('nisn'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nisn')}}</p>
                                    @endif
                                    <small>(Jika belum memiliki NISN silakan dikosongkan)</small>
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
                                    <small>( Bulan / Tanggal / Tahun )</small>
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

                            <div class="form-group {{$errors->has('asal_sekolah') ? 'has-error' : ''}}">
                                <label for="asal_sekolah" class="col-sm-2 control-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                    <input value="{{old('asal_sekolah')}}" type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah">
                                    @if($errors->has('asal_sekolah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('asal_sekolah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('alamat_asal_sekolah') ? 'has-error' : ''}}">
                                <label for="alamat_asal_sekolah" class="col-sm-2 control-label">Alamat Asal Sekolah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_asal_sekolah" id="alamat_asal_sekolah" rows="5" placeholder="Alamat Asal Sekolah">{{old('alamat_asal_sekolah')}}</textarea>
                                    @if($errors->has('alamat_asal_sekolah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('alamat_asal_sekolah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('anak_ke') ? 'has-error' : ''}}">
                                <label for="anak_ke" class="col-sm-2 control-label">Anak Ke</label>
                                <div class="col-sm-3">
                                    <input value="{{old('anak_ke')}}" type="number" class="form-control" name="anak_ke" id="anak_ke" placeholder="Contoh: 1">
                                    @if($errors->has('anak_ke'))
                                    <p class="help-block badge badge-danger">{{$errors->first('anak_ke')}}</p>
                                    @endif
                                    <small>(Isi dengan angka)</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('jumlah_saudara') ? 'has-error' : ''}}">
                                <label for="jumlah_saudara" class="col-sm-2 control-label">Jumlah Saudara</label>
                                <div class="col-sm-3">
                                    <input value="{{old('jumlah_saudara')}}" type="number" class="form-control" name="jumlah_saudara" id="jumlah_saudara" placeholder="Contoh: 1">
                                    @if($errors->has('jumlah_saudara'))
                                    <p class="help-block badge badge-danger">{{$errors->first('jumlah_saudara')}}</p>
                                    @endif
                                    <small>(Isi dengan angka)</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('telp_rumah') ? 'has-error' : ''}}">
                                <label for="telp_rumah" class="col-sm-2 control-label">Telepon Rumah</label>
                                <div class="col-sm-10">
                                    <input value="{{old('telp_rumah')}}" type="text" class="form-control" name="telp_rumah" id="telp_rumah" placeholder="Telepon Rumah">
                                    @if($errors->has('telp_rumah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('telp_rumah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('provinsi') ? 'has-error' : ''}}">
                                <label for="provinsi" class="col-sm-2 control-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input value="{{old('provinsi')}}" type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
                                    @if($errors->has('provinsi'))
                                    <p class="help-block badge badge-danger">{{$errors->first('provinsi')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('kabupaten') ? 'has-error' : ''}}">
                                <label for="kabupaten" class="col-sm-2 control-label">Kabupaten</label>
                                <div class="col-sm-10">
                                    <input value="{{old('kabupaten')}}" type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten">
                                    @if($errors->has('kabupaten'))
                                    <p class="help-block badge badge-danger">{{$errors->first('kabupaten')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('kecamatan') ? 'has-error' : ''}}">
                                <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input value="{{old('kecamatan')}}" type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
                                    @if($errors->has('kecamatan'))
                                    <p class="help-block badge badge-danger">{{$errors->first('kecamatan')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('kode_pos') ? 'has-error' : ''}}">
                                <label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input value="{{old('kode_pos')}}" type="number" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos">
                                    @if($errors->has('kode_pos'))
                                    <p class="help-block badge badge-danger">{{$errors->first('kode_pos')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('golongan_darah') ? 'has-error' : ''}}">
                                <label for="golongan_darah" class="col-sm-2 control-label">Golongan Darah</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="golongan_darah" id="golongan_darah">
                                        <option value="">--Pilih--</option>
                                        <option value="A" {{(old('golongan_darah') == 'A') ? 'selected' : ''}}>A</option>
                                        <option value="B" {{(old('golongan_darah') == 'B') ? 'selected' : ''}}>B</option>
                                        <option value="O" {{(old('golongan_darah') == 'O') ? 'selected' : ''}}>O</option>
                                        <option value="AB" {{(old('golongan_darah') == 'AB') ? 'selected' : ''}}>AB</option>
                                    </select>
                                    @if($errors->has('golongan_darah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('golongan_darah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('tinggi_badan') ? 'has-error' : ''}}">
                                <label for="tinggi_badan" class="col-sm-2 control-label">Tinggi Badan</label>
                                <div class="col-sm-3">
                                    <input value="{{old('tinggi_badan')}}" type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan">
                                    @if($errors->has('tinggi_badan'))
                                    <p class="help-block badge badge-danger">{{$errors->first('tinggi_badan')}}</p>
                                    @endif
                                </div>
                                <label for="tinggi_badan" class="col-sm-1 control-label">cm</label>
                            </div>

                            <div class="form-group {{$errors->has('berat_badan') ? 'has-error' : ''}}">
                                <label for="berat_badan" class="col-sm-2 control-label">Berat Badan</label>
                                <div class="col-sm-3">
                                    <input value="{{old('berat_badan')}}" type="number" class="form-control" name="berat_badan" id="berat_badan" placeholder="Berat Badan">
                                    @if($errors->has('berat_badan'))
                                    <p class="help-block badge badge-danger">{{$errors->first('berat_badan')}}</p>
                                    @endif
                                </div>
                                <label for="berat_badan" class="col-sm-1 control-label">kg</label>
                            </div>

                            <div class="form-group {{$errors->has('tgl_mendaftar') ? 'has-error' : ''}}">
                                <label for="tgl_mendaftar" class="col-sm-2 control-label">Tanggal Mendaftar</label>
                                <div class="col-sm-10">
                                    <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="tgl_mendaftar" id="tgl_mendaftar" placeholder="Tanggal Mendaftar">
                                    @if($errors->has('tgl_mendaftar'))
                                    <p class="help-block badge badge-danger">{{$errors->first('tgl_mendaftar')}}</p>
                                    @endif
                                    <small>( Bulan / Tanggal / Tahun )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('ket_riwayat_penyakit') ? 'has-error' : ''}}">
                                <label for="ket_riwayat_penyakit" class="col-sm-2 control-label">Riwayat Penyakit Dan Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="ket_riwayat_penyakit" id="ket_riwayat_penyakit" rows="5" placeholder="Jelaskan riwayat penyakit anda beserta keterangannya">{{old('ket_riwayat_penyakit')}}</textarea>
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
                                        <option value="">--Pilih--</option>
                                        <option value="1" {{(old('status_anak') == '1') ? 'selected' : ''}}>Yatim dan Piatu</option>
                                        <option value="2" {{(old('status_anak') == '2') ? 'selected' : ''}}>Yatim</option>
                                        <option value="3" {{(old('status_anak') == '3') ? 'selected' : ''}}>Piatu</option>
                                        <option value="4" {{(old('status_anak') == '4') ? 'selected' : ''}}>Keluarga Utuh</option>
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
                                        <option value="">--Pilih--</option>
                                        <option value="Bersama" {{(old('status_orang_tua') == 'Bersama') ? 'selected' : ''}}>Bersama</option>
                                        <option value="Cerai" {{(old('status_orang_tua') == 'Cerai') ? 'selected' : ''}}>Cerai</option>
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
                                        <option value="">--Pilih--</option>
                                        <option value="Diasuh ayah dan ibu" {{(old('status_asuh') == 'Diasuh ayah dan ibu') ? 'selected' : ''}}>Diasuh ayah dan ibu</option>
                                        <option value="Diasuh Ayah" {{(old('status_asuh') == 'Diasuh Ayah') ? 'selected' : ''}}>Diasuh Ayah</option>
                                        <option value="Diasuh Ibu" {{(old('status_asuh') == 'Diasuh Ibu') ? 'selected' : ''}}>Diasuh Ibu</option>
                                        <option value="Diasuh Wali" {{(old('status_asuh') == 'Diasuh Wali') ? 'selected' : ''}}>Diasuh Wali</option>
                                    </select>
                                    @if($errors->has('status_asuh'))
                                    <p class="help-block badge badge-danger">{{$errors->first('status_asuh')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('jurusan_pilihan1') ? 'has-error' : ''}}">
                                <label for="jurusan_pilihan1" class="col-sm-2 control-label">Jurusan Pilihan 1</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jurusan_pilihan1" id="jurusan_pilihan1">
                                        <option value="">--Pilih--</option>
                                        <option value="Agama" {{(old('jurusan_pilihan1') == 'Agama') ? 'selected' : ''}}>Agama</option>
                                        <option value="IPS" {{(old('jurusan_pilihan1') == 'IPS') ? 'selected' : ''}}>IPS</option>
                                        <option value="IPA" {{(old('jurusan_pilihan1') == 'IPA') ? 'selected' : ''}}>IPA</option>
                                    </select>
                                    @if($errors->has('jurusan_pilihan1'))
                                    <p class="help-block badge badge-danger">{{$errors->first('jurusan_pilihan1')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('jurusan_pilihan2') ? 'has-error' : ''}}">
                                <label for="jurusan_pilihan2" class="col-sm-2 control-label">Jurusan Pilihan 2</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="jurusan_pilihan2" id="jurusan_pilihan2">
                                        <option value="">--Pilih--</option>
                                        <option value="Agama" {{(old('jurusan_pilihan2') == 'Agama') ? 'selected' : ''}}>Agama</option>
                                        <option value="IPS" {{(old('jurusan_pilihan2') == 'IPS') ? 'selected' : ''}}>IPS</option>
                                        <option value="IPA" {{(old('jurusan_pilihan2') == 'IPA') ? 'selected' : ''}}>IPA</option>
                                    </select>
                                    @if($errors->has('jurusan_pilihan2'))
                                    <p class="help-block badge badge-danger">{{$errors->first('jurusan_pilihan2')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('ijazah') ? 'has-error' : ''}}">
                                <label for="ijazah" class="col-sm-2 control-label">Ijazah / SKHU</label>
                                <div class="col-sm-10">
                                    <input type="file" name="ijazah" class="form-control">
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
                                    <input value="{{old('nama_ayah')}}" type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah">
                                    @if($errors->has('nama_ayah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama_ayah')}}</p>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group {{$errors->has('penghasilan_ayah') ? 'has-error' : ''}}">
                                <label for="penghasilan_ayah" class="col-sm-2 control-label">Penghasilan Ayah Rp.</label>
                                <div class="col-sm-10">
                                    <input value="{{old('penghasilan_ayah')}}" type="number" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" placeholder="Penghasilan Ayah">
                                    @if($errors->has('penghasilan_ayah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('penghasilan_ayah')}}</p>
                                    @endif
                                    <small>( Diisi dengan angka)</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('pendidikan_ayah') ? 'has-error' : ''}}">
                                <label for="pendidikan_ayah" class="col-sm-2 control-label">Jenjang Pendidikan Ayah</label>
                                <div class="col-sm-10">
                                    <input value="{{old('pendidikan_ayah')}}" type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" placeholder="Pendidikan Ayah">
                                    @if($errors->has('pendidikan_ayah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('pendidikan_ayah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('pekerjaan_ayah') ? 'has-error' : ''}}">
                                <label for="pekerjaan_ayah" class="col-sm-2 control-label">Pekerjaan Ayah</label>
                                <div class="col-sm-10">
                                    <input value="{{old('pekerjaan_ayah')}}" type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
                                    @if($errors->has('pekerjaan_ayah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('pekerjaan_ayah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('no_hp_ayah') ? 'has-error' : ''}}">
                                <label for="no_hp_ayah" class="col-sm-2 control-label">Nomor HP Ayah</label>
                                <div class="col-sm-10">
                                    <input value="{{old('no_hp_ayah')}}" type="number" class="form-control" name="no_hp_ayah" id="no_hp_ayah" placeholder="Nomor HP Ayah">
                                    @if($errors->has('no_hp_ayah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('no_hp_ayah')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('alamat_ayah') ? 'has-error' : ''}}">
                                <label for="alamat_ayah" class="col-sm-2 control-label">Alamat Ayah</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" rows="5" placeholder="Alamat Ayah">{{old('alamat_ayah')}}</textarea>
                                    @if($errors->has('alamat_ayah'))
                                    <p class="help-block badge badge-danger">{{$errors->first('alamat_ayah')}}</p>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group {{$errors->has('nama_ibu') ? 'has-error' : ''}}">
                                <label for="nama_ibu" class="col-sm-2 control-label">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <input value="{{old('nama_ibu')}}" type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu">
                                    @if($errors->has('nama_ibu'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama_ibu')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('penghasilan_ibu') ? 'has-error' : ''}}">
                                <label for="penghasilan_ibu" class="col-sm-2 control-label">Penghasilan Ibu Rp.</label>
                                <div class="col-sm-10">
                                    <input value="{{old('penghasilan_ibu')}}" type="number" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" placeholder="Penghasilan Ibu">
                                    @if($errors->has('penghasilan_ibu'))
                                    <p class="help-block badge badge-danger">{{$errors->first('penghasilan_ibu')}}</p>
                                    @endif
                                    <small>( Diisi dengan angka)</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('pendidikan_ibu') ? 'has-error' : ''}}">
                                <label for="pendidikan_ibu" class="col-sm-2 control-label">Jenjang Pendidikan Ibu</label>
                                <div class="col-sm-10">
                                    <input value="{{old('pendidikan_ibu')}}" type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" placeholder="Pendidikan Ibu">
                                    @if($errors->has('pendidikan_ibu'))
                                    <p class="help-block badge badge-danger">{{$errors->first('pendidikan_ibu')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('pekerjaan_ibu') ? 'has-error' : ''}}">
                                <label for="pekerjaan_ibu" class="col-sm-2 control-label">Pekerjaan Ibu</label>
                                <div class="col-sm-10">
                                    <input value="{{old('pekerjaan_ibu')}}" type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu">
                                    @if($errors->has('pekerjaan_ibu'))
                                    <p class="help-block badge badge-danger">{{$errors->first('pekerjaan_ibu')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('no_hp_ibu') ? 'has-error' : ''}}">
                                <label for="no_hp_ibu" class="col-sm-2 control-label">Nomor HP Ibu</label>
                                <div class="col-sm-10">
                                    <input value="{{old('no_hp_ibu')}}" type="number" class="form-control" name="no_hp_ibu" id="no_hp_ibu" placeholder="Nomor HP Ibu">
                                    @if($errors->has('no_hp_ibu'))
                                    <p class="help-block badge badge-danger">{{$errors->first('no_hp_ibu')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('alamat_ibu') ? 'has-error' : ''}}">
                                <label for="alamat_ibu" class="col-sm-2 control-label">Alamat Ibu</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" rows="5" placeholder="Alamat Ibu">{{old('alamat_ibu')}}</textarea>
                                    @if($errors->has('alamat_ibu'))
                                    <p class="help-block badge badge-danger">{{$errors->first('alamat_ibu')}}</p>
                                    @endif
                                    <small>( Jika ibu serumah dengan ayah maka boleh dikosongkan )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('nama_wali') ? 'has-error' : ''}}">
                                <label for="nama_wali" class="col-sm-2 control-label">Nama Wali</label>
                                <div class="col-sm-10">
                                    <input value="{{old('nama_wali')}}" type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali">
                                    @if($errors->has('nama_wali'))
                                    <p class="help-block badge badge-danger">{{$errors->first('nama_wali')}}</p>
                                    @endif
                                    <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('penghasilan_wali') ? 'has-error' : ''}}">
                                <label for="penghasilan_wali" class="col-sm-2 control-label">Penghasilan Wali Rp.</label>
                                <div class="col-sm-10">
                                    <input value="{{old('penghasilan_wali')}}" type="number" class="form-control" name="penghasilan_wali" id="penghasilan_wali" placeholder="Penghasilan Wali">
                                    @if($errors->has('penghasilan_wali'))
                                    <p class="help-block badge badge-danger">{{$errors->first('penghasilan_wali')}}</p>
                                    @endif
                                    <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('pendidikan_wali') ? 'has-error' : ''}}">
                                <label for="pendidikan_wali" class="col-sm-2 control-label">Jenjang Pendidikan Wali</label>
                                <div class="col-sm-10">
                                    <input value="{{old('pendidikan_wali')}}" type="text" class="form-control" name="pendidikan_wali" id="pendidikan_wali" placeholder="Pendidikan Wali">
                                    @if($errors->has('pendidikan_wali'))
                                    <p class="help-block badge badge-danger">{{$errors->first('pendidikan_wali')}}</p>
                                    @endif
                                    <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('pekerjaan_wali') ? 'has-error' : ''}}">
                                <label for="pekerjaan_wali" class="col-sm-2 control-label">Pekerjaan Wali</label>
                                <div class="col-sm-10">
                                    <input value="{{old('pekerjaan_wali')}}" type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali">
                                    @if($errors->has('pekerjaan_wali'))
                                    <p class="help-block badge badge-danger">{{$errors->first('pekerjaan_wali')}}</p>
                                    @endif
                                    <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('no_hp_wali') ? 'has-error' : ''}}">
                                <label for="no_hp_wali" class="col-sm-2 control-label">Nomor HP Wali</label>
                                <div class="col-sm-10">
                                    <input value="{{old('no_hp_wali')}}" type="number" class="form-control" name="no_hp_wali" id="no_hp_wali" placeholder="Nomor HP Wali">
                                    @if($errors->has('no_hp_wali'))
                                    <p class="help-block badge badge-danger">{{$errors->first('no_hp_wali')}}</p>
                                    @endif
                                    <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                </div>
                            </div>

                            <div class="form-group {{$errors->has('alamat_wali') ? 'has-error' : ''}}">
                                <label for="alamat_wali" class="col-sm-2 control-label">Alamat Wali</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat_wali" id="alamat_wali" rows="5" placeholder="Alamat Wali">{{old('alamat_wali')}}</textarea>
                                    @if($errors->has('alamat_wali'))
                                    <p class="help-block badge badge-danger">{{$errors->first('alamat_wali')}}</p>
                                    @endif
                                    <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                                </div>
                            </div>
                        </div>

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

        <div class="modal fade" id="ganti-password">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form role="form" method="POST" action="{{route('bio_data.ganti_password',\Auth::user()->id)}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ganti Password</h4>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{\Auth::user()->email}}" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    <div id="password" class="form-text"><small>Isi dengan password lama</small></div>
                                </div>


                            </div>
                            <!-- /.box-body -->

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ganti</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->

    @else

    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-warning"></i>

                        <h3 class="box-title">Keterangan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="alert alert-success alert-dismissible">

                            <h4><i class="icon fa fa-check"></i> Selamat Biodata anda telah lengkap!</h4>

                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" onclick="window.open('<?= route('cetak_bukti') ?>')"><i class="fa fa-sticky-note"></i> Cetak Bukti Pendaftaran</button>

                        <a href="{{route('edit_bio',\Auth::user()->id)}}" class="btn btn-default pull-right"><i class="fa fa-pencil"></i> Edit</a>

                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @endif

    @endsection