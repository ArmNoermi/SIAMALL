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
                        <a href="/guru/tambah" class="btn btn-primary btn-flat">
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
                                <th>Nama Guru</th>
                                <th>Email</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat / Tanggal Lahir</th>
                                <th>No. HP</th>
                                <th>Alamat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$no++}}.</td>
                                <td><img src="{{$d->r_user_guru->getPhoto()}}" width="90px" height="130px"></td>
                                <td>{{$d->r_user_guru->name}}</td>
                                <td>{{$d->r_user_guru->email}}</td>
                                <td>{{$d->jenis_kelamin}}</td>
                                <td>{{$d->tempat_lahir}} / {{$d->tanggal_lahir}}</td>
                                <td>{{$d->r_user_guru->no_hp}}</td>
                                <td>{{$d->alamat}}</td>
                                <td class="text-center">
                                    <a href="/guru/{{$d->r_user_guru->id}}/edit-guru" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Update</a>
                                    <a href="#" class="btn btn-sm btn-danger delete" guru-id="{{$d->r_user_guru->id}}"><i class="fa fa-trash"></i> Hapus</a>
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
        var guru_id = $(this).attr('guru-id');
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
                    window.location = "/guru/" + guru_id + "/hapus";
                }
            });
    });
</script>
@endsection