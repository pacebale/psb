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
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    {!! Form::model($data,array('url'=>'admin/post/'.$data->id,'method'=>'patch','files'=>'true', 'id' => 'formValidate','class'=>'formValidate')) !!}

                    @csrf
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">

                                {!! Form::text('judul',null,['required','maxlength'=>'255','id'=>'judul','class'=>'form-control form-control-lg','placeholder'=>'Judul']) !!}



                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">

                                {!! Form::text('konten',null,['required','maxlength'=>'255','id'=>'konten','class'=>'form-control form-control-lg','placeholder'=>'Konten']) !!}



                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                <button type="submit" class="btn btn-default float-right">Save</button>
            </div>
            <!-- /.card-footer-->

            {!! Form::close() !!}
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@stop
