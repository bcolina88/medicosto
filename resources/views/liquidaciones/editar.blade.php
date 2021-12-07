@extends('layout.template')
@section('title')
Editar Descuento/Retención 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Descuento/Retención
        <small></small>
    </section>

 {!! Form::model($liquidacion, ['route'=>['liquidaciones.update', $liquidacion->id], 'method'=>'PUT']) !!}
@include('liquidaciones.forms.liquidacion')


{!! Form::close() !!}

@stop