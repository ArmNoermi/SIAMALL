@extends('back-end.layout.master')

@section('head')

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
                    <li class="breadcrumb-item"><a href="/nilai-siswa">Nilai Siswa</a></li>
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
                        <h3 class="card-title">{{$title}}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <a href="#" class="btn btn-default"><i class="fas fa-print"></i> Cetak</a>
                            </div>
                        </div>

                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Nama Guru</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($nilai as $m)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{$no++}}</td>
                                    <td>{{$m->kode}}</td>
                                    <td>{{$m->nama}}</td>
                                    <td>{{$m->guru->nama}}</td>
                                    <td>{{$m->pivot->nilai}}</td>
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
    $('.delete').click(function() {
        var post_id = $(this).attr('post-id');
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
                    window.location = "/posts/" + post_id + "/hapus";
                }
            });
    });
</script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection