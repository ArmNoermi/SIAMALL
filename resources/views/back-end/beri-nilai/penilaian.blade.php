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
                    <li class="breadcrumb-item"><a href="/beri-nilai">Beri Nilai</a></li>
                    <li class="breadcrumb-item"><a href="#">Penilaian Siswa</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{$siswa->r_user_siswa->getPhoto()}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$siswa->r_user_siswa->name}}</h3>

                        <p class="text-muted text-center">{{$siswa->r_user_siswa->email}}</p>

                        <p class="text-muted text-center">{{ucfirst($siswa->r_user_siswa->role)}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Jumlah Mata Pelajaran</b> <a class="float-right">{{$siswa->mapel->count()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form {{$title}}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <!-- <a href="/siswa/tambah" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a> -->

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahNilai">
                                    <i class="fas fa-plus"></i>
                                    <b>Tambah</b>
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- ./card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Semeter</th>
                                    <th>Nilai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($mapel as $m)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{$no++}}</td>
                                    <td>{{$m->kode}}</td>
                                    <td>{{$m->nama}}</td>
                                    <td>{{$m->semester}}</td>
                                    <td>
                                        <a href="#" class="nilai" data-type="text" data-pk="{{$m->id}}" data-url="/api/siswa/{{$siswa->id}}/edit-nilai" data-title="Edit Nilai">
                                            {{$m->pivot->nilai}}
                                        </a>
                                    </td>

                                    <td>
                                        <!-- <a href="/siswa/{{$siswa->id}}/edit-nilai" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a> -->

                                        <a href="#" class="btn btn-sm btn-danger delete" siswa-id="{{$siswa->id}}/{{$m->id}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                <div id="chartNilai"></div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->

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

</section>
<!-- /.content -->
@endsection

@section('foot')

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

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
@endsection