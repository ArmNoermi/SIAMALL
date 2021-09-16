@extends('back-end.layout.master')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

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
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Calon Siswa Pendaftar</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <a href="/siswa/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>

                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat / Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($data as $d)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{$no++}}.</td>
                                    <td><img src="{{$d->r_user_siswa->getPhoto()}}" width="90px" height="130px"></td>
                                    <td><a href="/siswa/{{$d->id}}/profile">{{$d->r_user_siswa->name}}</a></td>
                                    <td>{{$d->r_user_siswa->email}}</td>
                                    <td>{{$d->jenis_kelamin}}</td>
                                    <td>{{$d->tempat_lahir}} / {{$d->tanggal_lahir}}</td>
                                    <td>{{$d->agama}}</td>
                                    <td>{{$d->alamat}}</td>
                                    <td class="text-center">
                                        <a href="/siswa/{{$d->r_user_siswa->id}}/edit-siswa" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Update</a>
                                        <a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$d->r_user_siswa->id}}"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('foot')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script>
    $('.delete').click(function() {
        var siswa_id = $(this).attr('siswa-id');
        swal({
                title: "Yakin?",
                text: "Apakah anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/siswa/" + siswa_id + "/hapus";
                }
            });
    });
</script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection