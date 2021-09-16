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
                        @if(auth()->user()->role == 'guru')
                        <a href="/materi/tambah" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </a>
                        @endif
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul Materi</th>
                                <th>Mata Pelajaran</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($materi as $m)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$m->judul_materi}}</td>
                                <td>{{$m->mapel->nama}}</td>
                                <td class="text-center">
                                    @if(auth()->user()->role == 'guru')
                                    <a href="/materi/{{$m->id}}/edit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Update</a>
                                    <a href="#" class="btn btn-sm btn-danger delete" materi-id="{{$m->id}}"><i class="fa fa-trash"></i> Hapus</a>
                                    @endif

                                    <button class='btn btn-sm btn-default' type='button' onclick="window.open('<?php echo asset('/materi-pelajaran/' . $m->file) ?>')" formtarget='_self'>
                                        <span class='blue'>
                                            <i class='ace-icon fa fa-download'></i>
                                            Download
                                        </span>
                                    </button>
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
        var materi_id = $(this).attr('materi-id');
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
                    window.location = "/materi/" + materi_id + "/hapus";
                }
            });
    });
</script>
@endsection