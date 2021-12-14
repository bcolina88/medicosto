@extends('layout.template')
@section('title')
Editar Retención 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Retención
        <small></small>
    </section>

 {!! Form::model($liquidacion, ['route'=>['retenciones.update', $liquidacion->id], 'method'=>'PUT']) !!}
@include('liquidaciones.forms.liquidacion')


{!! Form::close() !!}

@stop