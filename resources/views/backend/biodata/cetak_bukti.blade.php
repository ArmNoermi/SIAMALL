<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti Pendaftaran</title>
</head>

<body>
    <div class="container">
        <center>
            <h2>BUKTI PENDAFTARAN</h2>
        </center>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><b>Nama Sekolah</b></td>
                            <td>:</td>
                            <td>Madrasah Aliyyah Al-Azhar Kandangan</td>

                            <td style="padding-left: 50px;"><b> Alamat </b></td>
                            <td>:</td>
                            <td>Jl. Banyu Barau, RT 7 / RK.IV Kelurahan Kandangan Barat Kec. Kandangan Hulu Sungai Selatan</td>
                        </tr>

                        <tr>
                            <td><b>No. Telp</b></td>
                            <td>:</td>
                            <td>+62 856 9364 6992</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">

                    <tbody>

                        <tr>
                            <td><b>ID Registrasi</b></td>
                            <td>:</td>
                            <td>{{$dt->id_registrasi}}</td>
                        </tr>

                        <tr>
                            <td><b>Tanggal Mendaftar</b></td>
                            <td>:</td>
                            <td>{{$dt->created_at->format('d M Y')}}</td>

                        </tr>

                        <tr>
                            <td><b>Nama</b></td>
                            <td>:</td>
                            <td>{{$dt->name}}</td>
                        </tr>

                        <tr>
                            <td><b>NISN</b></td>
                            <td>:</td>
                            <td>{{$dt->r_biodata_user->nisn}}</td>
                        </tr>

                        <tr>
                            <td><b>Email</b></td>
                            <td>:</td>
                            <td>{{$dt->email}}</td>
                        </tr>

                        <tr>
                            <td><b>No. HP</b></td>
                            <td>:</td>
                            <td>{{$dt->no_hp}}</td>
                        </tr>

                        <tr>
                            <td><b>Alamat</b></td>
                            <td>:</td>
                            <td>{{$dt->r_biodata_user->alamat}}</td>
                        </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>