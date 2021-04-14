@extends('adminlte::page')

@section('title','Administración - Roles')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop
@section('content_header')
    <h1>
        Roles
        @can('admin.roles.create')
        <a type="submit" name="nuevo" class="btn btn-default btn-sm float-right" href="{{ url('/admin/roles/create')}}" data-target="" >
            Nuevo
        </a>
        @endcan
    </h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de roles</h3>
                    </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tblRoles" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Role</th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <div class="form-group row mb-0">
                                            @can('admin.roles.edit')
                                                <a href="{{url('/admin/roles/edit', $role)}}" class="btn btn-sm btn-warning">Editar</a>
                                            @endcan
                                            @can('admin.roles.delete')
                                                <form method="POST" action="{{ url('/admin/roles/delete', $role->id) }}" class="form-delete">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

    @if (session('delete') == 'ok')
        <script>
            alert('Eliminado con exito');
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();
            var mensaje;
            var opcion = confirm("¿Está seguro?");
            if (opcion == true) {
                this.submit();
            }

        });

        $(document).ready(function() {
            $('#tblRoles').DataTable( {
                "order": [[ 1, "asc" ]],
                'language': {
				    'sProcessing':'Procesando...',
				    'sLengthMenu':'Mostrar _MENU_ registros',
				    'sZeroRecords':'No se encontraron resultados',
				    'sEmptyTable':'Ningún dato disponible en esta tabla',
				    'sInfo':'Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros',
				    'sInfoEmpty':'Mostrando registros del 0 al 0 de un total de 0 registros',
				    'sInfoFiltered':'(filtrado de un total de _MAX_ registros)',
				    'sInfoPostFix':'',
				    'sSearch':'Buscar:',
				    'sUrl':'',
				    'sInfoThousands':',',
				    'sLoadingRecords':'Cargando...',
				    'oPaginate': {
					    'sFirst':'Primero',
					    'sLast':'Último',
					    'sNext':'Siguiente',
					    'sPrevious':'Anterior'
				    },
				    'oAria': {
					    'sSortAscending':': Activar para ordenar la columna de manera ascendente',
					    'sSortDescending':': Activar para ordenar la columna de manera descendente'
				    }
			    },
                "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
      	        //"sDom": 'ltipr',
      	        //"iDisplayLength": 100,
      	        //dom: 'Bfrtip',
 			    'buttons': [
      		        'copy', 'csv', 'excel', 'pdf', 'print', {
              			extend:'cvsHtml5',
          		    	text: '<i class="fa fa-file-text-o></i>"',
              			titleAttr: 'CSV'
      		        }
  		        ],
			    "stateSave": true,
                //'responsive': true,
                'autoWidth' : false
		    });
        });
        $("[data-toggle='tooltip']").tooltip();
    </script>
@stop
