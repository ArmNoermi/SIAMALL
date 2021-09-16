@extends('backend.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

@if($data->role == 'calon_siswa')
<!-- Main content -->
<!-- Main content -->
<section class="content">

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">

                @if($cek < 1)<!-- timeline time label -->
                    <li class="time-label">
                        <span class="bg-dark">
                            {{$data->created_at->format('d M Y')}}
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-times bg-red"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-danger"><b>{{$pesan}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                    @elseif($cek != 0 && $data->is_verifikasi == 0 && $data->is_lulus == 0)
                    <!-- timeline time label -->
                    <li class="time-label">
                        <span class="bg-dark">
                            {{$data->created_at->format('d M Y')}}
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-check bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-primary"><b>{{$pesan}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-times bg-red"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-danger"><b>{{$status}}</b></label>
                            </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                    @elseif($cek != 0 && $data->is_verifikasi == 1 && $data->is_lulus == 0)
                    <!-- timeline time label -->
                    <li class="time-label">
                        <span class="bg-dark">
                            {{$data->created_at->format('d M Y')}}
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-check bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-primary"><b>{{$pesan}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->

                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-check bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-primary"><b>{{$status}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->

                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-times bg-red"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-danger"><b>{{$pesan_lulus}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>

                    @elseif($cek != 0 && $data->is_verifikasi == 1 && $data->is_lulus == 1)
                    <!-- timeline time label -->
                    <li class="time-label">
                        <span class="bg-dark">
                            {{$data->created_at->format('d M Y')}}
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-check bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-primary"><b>{{$pesan}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->

                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-check bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-primary"><b>{{$status}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->

                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-check bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i></span>

                            <h3 class="timeline-header"><a href="#"></a> Status</h3>

                            <div class="timeline-body">
                                <label class="label label-primary"><b>{{$pesan_lulus}}</b></label>
                            </div>

                        </div>
                    </li>
                    <!-- END timeline item -->
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                    @endif

            </ul>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


</section>
<!-- /.content -->
<!-- /.content -->

@else

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$jumlah_siswa}}</h3>

                    <p>Siswa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$jumlah_guru}}<sup style="font-size: 20px"></sup></h3>

                    <p>Guru</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$jumlah_postingan}}</h3>

                    <p>Postingan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$jumlah_mapel}}</h3>

                    <p>Mata Pelajaran</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->


</section>
<!-- /.content -->

@endif
@endsection