@extends('backend.layout.master')

@section('head')
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{$title}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data {{$title}}</h3>
                    <div class="pull-right">
                        <a href="{{route('siswa.tambah')}}" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
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
                            <tr>
                                <td>{{$no++}}.</td>
                                <td><img src="{{$d->r_user_siswa->getPhoto()}}" width="90px" height="130px"></td>
                                <td><a href="/siswa/{{$d->id}}/profile">{{$d->r_user_siswa->name}}</a></td>
                                <td>{{$d->r_user_siswa->email}}</td>
                                <td>{{$d->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                <td>{{$d->tempat_lahir}} / {{$d->tanggal_lahir}}</td>
                                <td>{{$d->agama}}</td>
                                <td>{{$d->alamat}}</td>
                                <td class="text-center">
                                    <a href="{{route('siswa.edit', $d->r_user_siswa->id)}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Update</a>
                                    <a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$d->r_user_siswa->id}}"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('foot')
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function() {
        $('#myTable').DataTable()
        // $('#example2').DataTable({
        //     'paging': true,
        //     'lengthChange': false,
        //     'searching': false,
        //     'ordering': true,
        //     'info': true,
        //     'autoWidth': false
        // })
    })
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
@endsection