@extends('layout.template')
@section('title')
Listado de Descuento/Retenc
@endsection
@section('content')


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">

              <h3 class="box-title">Listado de Descuento/Retención </h3>
@if (Session::has('message'))
 <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
@endif
  {!!Form::open(['route'=>'liquidaciones.index', 'method'=>'GET'])!!}
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Fecha</th>
                    <th>Cuota de Federación</th>
                    <th>Cuota de Colegio</th>
                    <th>Alícuota de Colegio</th>
                    <th>Liquida Imp. Ganancias</th>
              
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($liquidaciones as $medi)
                  <tr>

                    <td>{{$medi->id}}</td>
                    <td>{{$medi->fecha}}</td>
                    <td>{{$medi->federacion_cuota}}</td>
                    <td>{{$medi->colegio_cuota}}</td>
                    <td>{{$medi->colegio_alicuota}}</td>
                    <td>


                        @if($medi->liquida_imp ==1)
                          <p class="text-green">Corresponde</p>
                        @else
                          <p class="text-red">No Corresponde</p>
                        @endif


                    </td>
               
            
            
                     <td>
                      <div class="btn-group">
                    {!! Form::model($medi, ['route'=>['liquidaciones.update', $medi->id], 'method'=>'DELETE']) !!}

            
		            
                    @if (\App\Http\Controllers\RolesController::editar(8))
		             <a href="{{route("liquidaciones.edit", ['id' => $medi->id])}}" onclick="return confirm('Seguro que Desea Editar Descuento/Retención #{{$medi->id}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
                    @endif
                    
		             

		             @if (Auth::user()->idrole == 1)
                       @if (\App\Http\Controllers\RolesController::borrar(8))
		               <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar Descuento/Retención #{{$medi->id}}')" ></i></button> 
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

              @if (\App\Http\Controllers\RolesController::agregar(8))
              <a href="{{route('liquidaciones.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nueva Descuento/Retención</b></a> 
              @endif
              
              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $liquidaciones->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop


@section('javascript')

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

@endsection
