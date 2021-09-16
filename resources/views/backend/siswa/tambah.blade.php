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
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Form {{$title}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="{{route('siswa.post_tambah')}}" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="box-body">

                        <div class="form-group {{$errors->has('photo') ? 'has-error' : ''}}">
                            <label class="col-sm-2 control-label">Pas Foto</label>
                            <div class="col-sm-10">
                                <input type="file" name="photo" class="form-control">
                                @if($errors->has('photo'))
                                <p class="help-block badge badge-danger">{{$errors->first('photo')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                            <label for="nama" class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{old('nama')}}" name="nama" id="nama" placeholder="Nama Lengkap">
                                @if($errors->has('nama'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{$errors->has('nama_panggilan') ? 'has-error' : ''}}">
                            <label for="nama_panggilan" class="col-sm-2 control-label">Nama Panggilan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{old('nama_panggilan')}}" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan">
                                @if($errors->has('nama_panggilan'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama_panggilan')}}</p>
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
                                <input type="number" class="form-control" value="{{old('no_hp')}}" name="no_hp" id="no_hp" placeholder="Nomor Handphone">
                                @if($errors->has('no_hp'))
                                <p class="help-block badge badge-danger">{{$errors->first('no_hp')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('nisn') ? 'has-error' : ''}}">
                            <label for="nisn" class="col-sm-2 control-label">NISN</label>
                            <div class="col-sm-10">
                                <input value="{{old('nisn')}}" type="text" class="form-control" name="nisn" id="nisn" placeholder="NISN">
                                @if($errors->has('nisn'))
                                <p class="help-block badge badge-danger">{{$errors->first('nisn')}}</p>
                                @endif
                                <span>(Jika belum memiliki NISN silakan dikosongkan)</span>
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
                                <input value="{{old('telp_rumah')}}" type="number" class="form-control" name="telp_rumah" id="telp_rumah" placeholder="Telepon Rumah">
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
                            <label for="penghasilan_ayah" class="col-sm-2 control-label">Penghasilan Ayah</label>
                            <div class="col-sm-10">
                                <input value="{{old('penghasilan_ayah')}}" type="number" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" placeholder="Penghasilan Ayah">
                                @if($errors->has('penghasilan_ayah'))
                                <p class="help-block badge badge-danger">{{$errors->first('penghasilan_ayah')}}</p>
                                @endif
                                <small>( Diisi dengan angka)</small>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('pendidikan_ayah') ? 'has-error' : ''}}">
                            <label for="pendidikan_ayah" class="col-sm-2 control-label">Pendidikan Ayah</label>
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
                            <label for="penghasilan_ibu" class="col-sm-2 control-label">Penghasilan Ibu</label>
                            <div class="col-sm-10">
                                <input value="{{old('penghasilan_ibu')}}" type="number" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" placeholder="Penghasilan Ibu">
                                @if($errors->has('penghasilan_ibu'))
                                <p class="help-block badge badge-danger">{{$errors->first('penghasilan_ibu')}}</p>
                                @endif
                                <small>( Diisi dengan angka)</small>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('pendidikan_ibu') ? 'has-error' : ''}}">
                            <label for="pendidikan_ibu" class="col-sm-2 control-label">Pendidikan Ibu</label>
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
                            <label for="penghasilan_wali" class="col-sm-2 control-label">Penghasilan Wali</label>
                            <div class="col-sm-10">
                                <input value="{{old('penghasilan_wali')}}" type="number" class="form-control" name="penghasilan_wali" id="penghasilan_wali" placeholder="Penghasilan Wali">
                                @if($errors->has('penghasilan_wali'))
                                <p class="help-block badge badge-danger">{{$errors->first('penghasilan_wali')}}</p>
                                @endif
                                <small>( Kosongkan jika anda bersama ibu atau ayah atau bersama keduanya )</small>
                            </div>
                        </div>

                        <div class="form-group {{$errors->has('pendidikan_wali') ? 'has-error' : ''}}">
                            <label for="pendidikan_wali" class="col-sm-2 control-label">Pendidikan Wali</label>
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
</section>
<!-- /.content -->
@endsection