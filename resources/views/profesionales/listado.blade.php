@extends('layout.template')
@section('title')
Listado de Profesionales
@endsection
@section('content')


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">

              <h3 class="box-title">Listado de Profesionales</h3>
@if (Session::has('message'))
 <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
@endif
  {!!Form::open(['route'=>'profesionales.index', 'method'=>'GET'])!!}
<div class="input-group">

                      <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar..."/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>

            </div>
            {!!Form::close()!!}
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Matricula</th>
                    <th>CUIT</th>
                    <th>Telefono</th>
                    <th>Estado</th>

              
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($profesionales as $profesional)
                  <tr>

                    <td>{{$profesional->id}}</td>
                    <td>{{$profesional->nombre}}</td>
                    <td>{{$profesional->apellido}}</td>
                    <td>{{$profesional->matricula}}</td>
                    <td>{{$profesional->cuit}}</td>
                    <td>{{$profesional->telefono}}</td>
                    <td>


                        @if($profesional->active)
                          <p class="text-green">Activo</p>
                        @else
                          <p class="text-red">Inhactivo</p>
                        @endif


                    </td>
            
            
                     <td>
                      <div class="btn-group">
               {!! Form::model($profesional, ['route'=>['profesionales.update', $profesional->id], 'method'=>'DELETE']) !!}

  
                     @if (\App\Http\Controllers\RolesController::inhabilitar(7))

			               @if ($profesional->active === 1)
			              <a href="{{route("profesionales.deactivate", ['id' => $profesional->id])}}" onclick="return confirm('Seguro que Desea Deshabilitar al profesional #{{$profesional->id}} ')" class="btn btn-default btn-primary fa fa-toggle-on" data-toggle="tooltip" data-placement="top" title="Deshabilitar"><b></b></a> 
			              @endif


			               @if ($profesional->active === 0)
			              <a href="{{route("profesionales.activate", ['id' => $profesional->id])}}" onclick="return confirm('Seguro que Desea Habilitar al profesional #{{$profesional->id}} ')" class="btn btn-default btn-primary fa fa-toggle-off" data-toggle="tooltip" data-placement="top" title="Habilitar"><b></b></a> 
			              @endif

                    @endif






                    @if (\App\Http\Controllers\RolesController::editar(7))
                     	<a href="{{route("profesionales.edit", ['id' => $profesional->id])}}" onclick="return confirm('Seguro que Desea Editar profesional #{{$profesional->id}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                    @endif

              

                    @if (Auth::user()->idrole == 1)
                        @if (\App\Http\Controllers\RolesController::borrar(7))
                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar Profesional #{{$profesional->id}}')" ></i></button> 
                        @endif
                    @endif
            

            {!! Form::close() !!}

             


              </div>
                    </td>
                  </tr>
                     @empty

                  No hay Datos que Motrar.
                    @endforelse


                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

                    @if (\App\Http\Controllers\RolesController::agregar(7))
             			<a href="{{route('profesionales.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nuevo profesional</b></a> 
                    @endif
              

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $profesionales->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop