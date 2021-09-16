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
                                <a href="/calon-siswa" class="btn btn-primary"><i class="fas fa-users"></i> Semua Calon Siswa</a>
                                <a href="/calon-siswa/terverifikasi" class="btn btn-warning"><i class="fas fa-check"></i> Sudah Terverifikasi</a>
                                <a href="/calon-siswa/tak_terverifikasi" class="btn btn-default"><i class="fas fa-hourglass"></i> Belum Terverifikasi</a>
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
                                    <th>Tanggal Mendaftar</th>
                                    <th>ID Registrasi</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Action</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($data as $d)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{$no++}}.</td>
                                    <td>
                                        <img src="{{$d->getPhoto()}}" style="width: 80px;">
                                    </td>
                                    <td>{{$d->created_at}}</td>
                                    <td>{{$d->id_registrasi}}</td>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->email}} <b>({{$d->role}})</b></td>

                                    @if($d->r_biodata_user_count > 0 && $d->is_verifikasi == 1 && $d->is_lulus == 1 && $d->is_export == 1 && $d->id_registrasi != null)
                                    <td>
                                        <h5><span class="badge bg-primary">Biodata Lengkap</span></h5>
                                        <h5><span class="badge bg-warning">Status Terverifikasi</span></h5>
                                        <h5><span class="badge bg-success">Status Lulus</span></h5>
                                        <h5><span class="badge bg-info">Data telah di export</span></h5>
                                    </td>
                                    @elseif($d->r_biodata_user_count > 0 && $d->is_verifikasi == 1 && $d->is_lulus == 1 && $d->is_export == 0 && $d->id_registrasi != null)
                                    <td>
                                        <h5><label class="badge bg-primary">Biodata Lengkap</label></h5>
                                        <h5><label class="badge bg-warning">Status Terverifikasi</label></h5>
                                        <h5><label class="badge bg-success">Status Lulus</label></h5>
                                        <!-- <h4><label class="label label-warning">Biodata Belum Lengkap</label></h4> -->
                                    </td>
                                    @elseif($d->r_biodata_user_count > 0 && $d->is_verifikasi == 1 && $d->is_lulus == 0 && $d->is_export == 0 && $d->id_registrasi != null)
                                    <td>
                                        <h5><label class="badge bg-primary">Biodata Lengkap</label></h5>
                                        <h5><label class="badge bg-warning">Status Terverifikasi</label></h5>

                                    </td>
                                    @elseif($d->r_biodata_user_count > 0 && $d->is_verifikasi == 0 && $d->is_lulus == 0 && $d->is_export == 0 && $d->id_registrasi != null)
                                    <td>
                                        <h5><label class="badge bg-primary">Biodata Lengkap</label></h5>
                                    </td>
                                    @elseif($d->r_biodata_user_count < 1 && $d->is_verifikasi == 0 && $d->is_lulus == 0 && $d->is_export == 0 && $d->id_registrasi != null)
                                        <td>
                                            <h5><label class="badge bg-danger">Biodata Belum Lengkap</label></h5>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif

                                        <td class="text-center">
                                            @if($d->r_biodata_user_count > 0 && $d->is_verifikasi == 0 && $d->is_lulus == 0 && $d->is_export == 0)
                                            <a href="/calon-siswa/{{$d->id}}/verifikasi" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Verify?</a>
                                            @elseif($d->r_biodata_user_count > 0 && $d->is_verifikasi == 1 && $d->is_lulus == 0 && $d->is_export == 0)
                                            <a href="{{ url('calon-siswa/lulus/' . $d->id) }}" class="btn btn-sm btn-success"><i class="fas fa-check-double"></i> Luluskan?</a>
                                            @elseif($d->r_biodata_user_count > 0 && $d->is_verifikasi == 1 && $d->is_lulus == 1 && $d->is_export == 0)
                                            <a href="/calon-siswa/{{$d->id}}/export" class="btn btn-sm btn-default"> Export <i class="fas fa-arrow-right"></i></a>
                                            @endif
                                            <a href="{{ url('calon-siswa/edit/' . $d->id) }}" class="btn btn-sm btn-warning"> <i class="fas fa-edit"> </i></a>
                                            <!-- <a href="{{ url('calon-siswa/hapus/' . $d->id) }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a> -->

                                            <a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$d->id}}"><i class="fas fa-trash"></i> </a>
                                        </td>

                                        <td>
                                            @if($d->r_biodata_user_count > 0)
                                            <a href="{{ asset('biodata/' . $d->r_biodata_user->ijazah) }}" class="btn btn-sm btn-secondary" download=""><i class="fas fa-sticky-note"></i> Ijazah</a>
                                            @endif
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
                    window.location = "/calon-siswa/hapus/" + siswa_id;
                }
            });
    });
</script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection