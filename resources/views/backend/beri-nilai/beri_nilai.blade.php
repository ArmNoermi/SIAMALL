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

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Murid</th>
                                <th>Beri Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($siswa as $s)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$s->nama_panggilan}}</td>
                                <td>
                                    <a href="/penilaian/{{$s->id}}/{{$s->semester_id}}" class="btn btn-default"><i class="fa fa-edit"></i> Nilai</a>
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