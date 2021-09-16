@extends('front-end.layout.master')

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front-end/styles/contact_responsive.css')}}">
@endsection

@section('content')
<div class="home">
    <div class="breadcrumbs_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Pendaftaran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->

<div class="contact">

    <div class="contact_info_container">
        <div class="container">
            <div class="row">

                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact_form">
                        <div class="contact_info_title">Form Pendaftaran</div>
                        <form action="{{route('user_baru')}}" method="POST" enctype="multipart/form-data" class="comment_form">
                            @csrf
                            <div class="form-group {{$errors->has('nama') ? 'has-error' : ''}}">
                                <div class="form_title">Nama Lengkap</div>
                                <input type="text" name="nama" class="comment_input" value="{{old('nama')}}">
                                @if($errors->has('nama'))
                                <p class="help-block badge badge-danger">{{$errors->first('nama')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                <div class="form_title">Email</div>
                                <input type="text" name="email" class="comment_input" value="{{old('email')}}">
                                @if($errors->has('email'))
                                <p class="help-block badge badge-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('no_hp') ? 'has-error' : ''}}">
                                <div class="form_title">Nomor HP</div>
                                <input type="number" name="no_hp" class="comment_input" value="{{old('no_hp')}}">
                                @if($errors->has('no_hp'))
                                <p class="help-block badge badge-danger">{{$errors->first('no_hp')}}</p>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('photo') ? 'has-error' : ''}}">
                                <div class="form_title">Pas Foto</div>
                                <input type="file" name="photo">
                                <p>(Silakan masukkan pas foto dengan latar belakang merah)</p>
                                @if($errors->has('photo'))
                                <p class="help-block badge badge-danger">{{$errors->first('photo')}}</p>
                                @endif
                            </div>

                            <div>
                                <button type="submit" class="comment_button trans_200">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="contact_info_title">Info</div>
                        <div class="contact_info_text">
                            <p>"Silakan isi form pendaftaran ini untuk mendapatkan akun agar bisa login ke form selanjutnya"</p>
                        </div>
                        <div class="contact_info_location">
                            <div class="contact_info_location_title">Alamat Sekolah</div>
                            <ul class="location_list">
                                <li>Jl. Banyu Barau, RT 7 / RK.IV Kelurahan Kandangan Barat Kec. Kandangan Hulu Sungai Selatan</li>
                                <li>+62 856 9364 6992</li>
                                <li>al-azhar.kandangan@gmail.com</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('foot')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('front-end/plugins/marker_with_label/marker_with_label.js')}}"></script>
<script src="{{asset('front-end/js/contact.js')}}"></script>
@endsection