@extends('admin.master.master')
@section('content')


    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>

                    <tr>
                        <th>Judul</th>
                        <th>Opsi</th>

                    </tr>


                    </thead>
                    <tbody>

                    <?php $no=0; ?>
                    @if (count($data) > 0)
                        @foreach($data as $a)

                            <?php $no++; ?>
                    <tr>
                        <td>{{$a->judul}}</td>

                        <td>
                            <a href="{{ url('admin/post/'.$a->id.'/edit') }}" class="btn bg-gradient-success">Edit</a> |
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$a->id}}">
                                Hapus
                            </button></td>
                    </tr>


                            <div class="modal fade" id="modal-danger{{$a->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Konfirmasi!</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Menghapus data ini?</p>
                                        </div>
                                        {!! Form::open(array('id'=>'delete','method'=>'delete','url'=>'admin/post/'.$a->id))!!}

                                        {!!Form::hidden('_delete','DELETE')!!}
                                        <div class="modal-footer justify-content-between">

                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-light">Yakin</button>

                                        </div>

                                        {!! Form::close()!!}
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                    @else

                        <tr>
                            <td>Belum Ada Data</td>
                            <td> </td>

                        </tr>

                    @endif
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@stop
