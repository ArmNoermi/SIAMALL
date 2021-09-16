@extends('backend.layout.master')

@section('head')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />
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
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{$siswa->r_user_siswa->getPhoto()}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{$siswa->r_user_siswa->name}}</h3>

                    <p class="text-muted text-center">{{ucfirst($siswa->r_user_siswa->role)}}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{$siswa->r_user_siswa->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Handphone</b> <a class="pull-right">{{$siswa->r_user_siswa->no_hp}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Sejak</b> <a class="pull-right">{{$siswa->r_user_siswa->created_at->format('d M Y')}}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data Mata Pelajaran</h3>
                    <div class="pull-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahNilai">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Semeter</th>
                                <th>Nilai</th>
                                <th>Guru</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($mapel as $m)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$m->kode}}</td>
                                <td>{{$m->nama}}</td>
                                <td>{{$m->semester}}</td>
                                <td>
                                    <a href="#" class="nilai" data-type="text" data-pk="{{$m->id}}" data-url="/api/siswa/{{$siswa->id}}/edit-nilai" data-title="Edit Nilai">
                                        {{$m->pivot->nilai}}
                                    </a>
                                </td>
                                <td>{{$m->guru->nama}}</td>

                                <td>
                                    <!-- <a href="/siswa/{{$siswa->id}}/edit-nilai" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a> -->

                                    <a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$siswa->id}}/{{$m->id}}"><i class="fa fa-trash"></i></a>
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

        <div class="modal fade" id="tambahNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>

                    </div>
                    <div class="modal-body">
                        <form action="/penilaian/{{$siswa->id}}/tambahNilai" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group {{$errors->has('mapel') ? 'has-error' : ''}}">
                                <label for=" mapel">Mata Pelajaran</label>
                                <select class="form-control" name="mapel" id="mapel">
                                    <option value="">--Pilih--</option>
                                    @foreach($mata_pelajaran as $mp)
                                    <option value="{{$mp->id}}">{{$mp->nama}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('mapel'))
                                <span class="help-block">{{$errors->first('mapel')}}</span>
                                @endif
                            </div>

                            <div class="form-group {{$errors->has('nilai') ? 'has-error' : ''}}">
                                <label for="nilai">Nilai</label>
                                <input type="text" name="nilai" class="form-control" id="nilai" value="{{old('nilai')}}" placeholder="Ketik...">
                                @if($errors->has('nilai'))
                                <span class="help-block">{{$errors->first('nilai')}}</span>
                                @endif
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection

@section('foot')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<!-- <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->

<script>
    $(document).ready(function() {
        $('.nilai').editable();
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
                    window.location = "/penilaian/" + siswa_id + "/hapus-nilai";
                }
            });
    });
</script>
@endsection