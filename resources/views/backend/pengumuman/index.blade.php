@extends('backend.layout.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{$title}}
        <small>Panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$title}}</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if($user->is_lulus == 1)
            <div class="box box-success">
                @elseif($user->is_menunggu == 1)
                <div class="box box-warning">
                    @else
                    <div class="box box-danger">
                        @endif
                        <div class="box-header with-border">
                            <i class="fa fa-warning"></i>

                            <h3 class="box-title">Pengumuman</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if($user->is_lulus == 1)
                            <div class="alert alert-success alert-dismissible">
                                <h4><i class="icon fa fa-check"></i> SELAMAT ANDA LULUS! :)</h4>
                            </div>
                            @elseif($user->is_menunggu == 1)
                            <div class="alert alert-warning alert-dismissible">
                                <h4><i class="icon fa fa-pause"></i> Harap sabar menunggu :)</h4>
                            </div>
                            @else
                            <div class="alert alert-danger alert-dismissible">
                                <h4><i class="icon fa fa-times"></i> Kami dengan hormat meminta maaf karna anda belum memenuhi spesifikasi untuk lulus :(</h4>
                            </div>
                            @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            @if($user->is_lulus == 1)
                            <a href="{{route('pengumuman.lulus', $user->id)}}" class="btn btn-default pull-right"><i class="fa fa-eye"></i> Lihat semua yang lulus</a>

                            @endif
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
</section>
<!-- /.content -->

@endsection