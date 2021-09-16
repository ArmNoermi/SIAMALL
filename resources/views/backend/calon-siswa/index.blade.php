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
                                <th>Tanggal Mendaftar</th>
                                <th>ID Registrasi</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Status Anak</th>
                                <th>Keterangan</th>
                                <th class="text-center">Action</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($data as $d)
                            <tr>
                                <td>{{$no++}}.</td>
                                <td>{{$d->tgl_mendaftar}}</td>
                                <td>{{$d->r_user_biodata->id_registrasi}}</td>
                                <td>{{$d->r_user_biodata->name}}</td>
                                <td>{{$d->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                <td>{{$d->r_user_biodata->email}}</td>
                                <td>{{$d->status_anak == 1 ? "Yatim dan Piatu" : ( $d->status_anak == 2 ? "Yatim" : ( $d->status_anak == 3 ? "Piatu" : "Keluarga Utuh" )) }}</td>

                                @if($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 1 && $d->r_user_biodata->is_lulus == 1 && $d->r_user_biodata->is_export == 1 && $d->r_user_biodata->id_registrasi != null)
                                <td>
                                    <h5><span class="label label-primary">Biodata Lengkap</span></h5>
                                    <h5><span class="label label-warning">Status Terverifikasi</span></h5>
                                    <h5><span class="label label-success">Status Lulus</span></h5>
                                    <h5><span class="label label-info">Di export ke Siswa</span></h5>
                                </td>
                                @elseif($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 1 && $d->r_user_biodata->is_lulus == 1 && $d->r_user_biodata->is_export == 0 && $d->r_user_biodata->id_registrasi != null)
                                <td>
                                    <h5><label class="label label-primary">Biodata Lengkap</label></h5>
                                    <h5><label class="label label-warning">Status Terverifikasi</label></h5>
                                    <h5><label class="label label-success">Status Lulus</label></h5>
                                    <!-- <h4><label class="label label-warning">Biodata Belum Lengkap</label></h4> -->
                                </td>
                                @elseif($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 1 && $d->r_user_biodata->is_lulus == 0 && $d->r_user_biodata->is_export == 0 && $d->r_user_biodata->id_registrasi != null)
                                <td>
                                    <h5><label class="label label-primary">Biodata Lengkap</label></h5>
                                    <h5><label class="label label-warning">Status Terverifikasi</label></h5>

                                </td>
                                @elseif($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 0 && $d->r_user_biodata->is_lulus == 0 && $d->r_user_biodata->is_export == 0 && $d->r_user_biodata->id_registrasi != null)
                                <td>
                                    <h5><label class="label label-primary">Biodata Lengkap</label></h5>
                                </td>
                                @elseif($d->r_user_biodata_count < 1 && $d->r_user_biodata->is_verifikasi == 0 && $d->r_user_biodata->is_lulus == 0 && $d->r_user_biodata->is_export == 0 && $d->r_user_biodata->id_registrasi != null)
                                    <td>
                                        <h5><label class="label label-danger">Biodata Belum Lengkap</label></h5>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif

                                    <td class="text-center">
                                        @if($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 0 && $d->r_user_biodata->is_lulus == 0 && $d->r_user_biodata->is_export == 0)
                                        <a href="{{route('verifikasi', $d->r_user_biodata->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Verify?</a>
                                        @elseif($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 1 && $d->r_user_biodata->is_lulus == 0 && $d->r_user_biodata->is_export == 0)
                                        <a href="{{route('lulus', $d->r_user_biodata->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-double"></i> Luluskan?</a>
                                        @elseif($d->r_user_biodata_count > 0 && $d->r_user_biodata->is_verifikasi == 1 && $d->r_user_biodata->is_lulus == 1 && $d->r_user_biodata->is_export == 0)
                                        <a href="{{route('calon_siswa.export', $d->r_user_biodata->id)}}" class="btn btn-sm btn-default"> Export <i class="fa fa-arrow-right"></i></a>
                                        @endif
                                        <a href="{{route('calon_siswa.edit', $d->r_user_biodata->id)}}" class="btn btn-sm btn-warning"> <i class="fa fa-edit"> </i></a>
                                        <!-- <a href="{{ url('calon-siswa/hapus/' . $d->id) }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a> -->

                                        <a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$d->r_user_biodata->id}}"><i class="fa fa-trash"></i> </a>
                                    </td>

                                    <td>
                                        @if($d->r_user_biodata_count > 0)
                                        <a href="{{ asset('biodata/' . $d->ijazah) }}" class="btn btn-sm btn-default" download=""><i class="fa fa-sticky-note"></i> Ijazah</a>
                                        @endif
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
                    window.location = "/calon-siswa/hapus/" + siswa_id;
                }
            });
    });
</script>
@endsection