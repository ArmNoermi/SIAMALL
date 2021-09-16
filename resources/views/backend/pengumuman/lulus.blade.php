@extends('backend.layout.master')


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

            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Data {{$title}}</h3>
                    <!-- <div class="pull-right">
                        <a href="/siswa/tambah" class="btn btn-primary btn-flat">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </a>
                    </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px">No.</th>
                                <th>ID Registrasi</th>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($user as $u)
                            <tr>
                                <td>{{$no++}}.</td>
                                <td>{{$u->id_registrasi}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
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