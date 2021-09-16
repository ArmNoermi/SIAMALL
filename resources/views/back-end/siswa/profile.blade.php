@extends('back-end.layout.master')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" />

<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> -->
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
                    <li class="breadcrumb-item"><a href="/siswa">Siswa</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
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

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>

                        <p class="text-muted">{{$siswa->alamat}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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
                                    <th>Guru</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach($siswa->mapel as $m)
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
                                    <td>{{$m->guru->nama}}</td>

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
                    <form action="/siswa/{{$siswa->id}}/tambahNilai" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group {{$errors->has('mapel') ? 'has-error' : ''}}"">
                                <label for=" mapel">Mata Pelajaran</label>
                            <select class="form-control" name="mapel" id="mapel">
                                <option value="">--Pilih--</option>
                                @foreach($mapel as $mp)
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> -->
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->

<script>
    Highcharts.chart('chartNilai', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Laporan Nilai Siswa'
        },
        xAxis: {
            categories: <?php echo json_encode($categories) ?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Nilai'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Mata Pelajaran',
            data: <?php echo json_encode($data) ?>

        }]
    });

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
                    window.location = "/siswa/" + siswa_id + "/delete-nilai";
                }
            });
    });
</script>
@endsection