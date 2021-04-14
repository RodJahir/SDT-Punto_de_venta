@extends('adminlte::page')

@section('title','Administración - Roles')


@section('content_header')
    <h1>
        Editar rol
    </h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {!! Form::model($role, ['route'=>['admin.roles.update', $role], 'method'=>'put']) !!}

                            @include('admin.roles.partials.form')

                            {!! Form::submit('Editar rol', ['class'=>'btn btn-primary mt-2'])!!}
                        {!! Form::close() !!}
                    </div>
                <!-- /.card-header -->
                <div class="card-body">

                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

@stop

@section('js')


    <script>

    </script>
@stop
