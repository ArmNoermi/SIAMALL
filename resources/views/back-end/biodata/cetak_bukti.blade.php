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

        </center>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama Sekolah</th>
                            <td>:</td>
                            <td>Madrasah Aliyyah Al-Azhar Kandangan</td>

                            <th style="padding-left: 50px;">Alamat</th>
                            <td>:</td>
                            <td>Jl. Banyu Barau Kandangan</td>
                        </tr>

                        <tr>
                            <th>Nomor Telepon</th>
                            <td>:</td>
                            <td>0812211221</td>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Registrasi</th>
                            <th>Nama</th>
                            <th>NISN</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{$dt->id_registrasi}}</td>
                            <td>{{$dt->name}}</td>
                            <td>{{$dt->r_biodata_user->nisn}}</td>
                            <td>{{$dt->email}}</td>
                            <td>{{$dt->no_hp}}</td>
                            <td>{{$dt->r_biodata_user->alamat}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>