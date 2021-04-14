@extends('adminlte::page')

@section('title','Administración - Usuarios')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop
@section('content_header')
    <h1>
        Usuarios
        <!-- <a type="submit" name="nuevo" class="btn btn-default" href="{{ url('/admin/user/create')}}" data-target="" >
            Nuevo
        </a> -->
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
                    <table id="tblUsers" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>email</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <td>&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <div class="form-group row mb-0">
                                            <a href="{{url('/admin/user/edit', $item->id)}}" class="btn btn-warning">Editar</a>

                                            <form method="POST" action="{{ url('/admin/user/delete', $item) }}" class="form-delete">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Id</th>
                                <th>Nombre</th>
                                <th>email</th>
                                <th>created_at</th>
                                <th>updated_at</th>
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
            $('#tblUsers').DataTable( {
                "order": [[ 0, "desc" ]],
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
