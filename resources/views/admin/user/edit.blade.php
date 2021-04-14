
@extends('adminlte::page')

@section('title','Administración - Editar usuario')

@section('content_header')
    <h1>
        Editar usuario
        <a type="submit" name="nuevo" class="btn btn-default" href="{{ url('/admin/user')}}" data-target="" >
            Regresar
        </a>
    </h1>
@stop

@section('content')

<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Usuarios</h3>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">

                <form method="POST" action="{{ url('/admin/user/update', $user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <p class="form-control">{{ $user->name}}</p>
                            </div>
                        </div>

                        <!-- !! Form::model($user, ['route'=>['admin.user.update', $user], 'method'=>'put']) !! -->
                            @foreach($roles as $role)
                                <div>
                                    <label>
                                        <!-- !! Form::checkbox('roles[]',$role->id, null, ['class' => 'mr-1']) !! -->
                                        {{$role->name}}
                                    </label>
                                </div>
                                @endforeach
                        <!-- !! Form::close() !! -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- <form method="POST" action="{{ url('/admin/user/update', $user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus value="{{ $user->name }}" disabled>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correro electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        !-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                             <div class="col-md-6">
                                <span class="help-block" role="alert">
                                    Si no quiere actualizar la contraseña, no coloque nada en los campos de contraseña
                                </span>
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div> --

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form> -->
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
        $("[data-toggle='tooltip']").tooltip();
    </script>
@stop
