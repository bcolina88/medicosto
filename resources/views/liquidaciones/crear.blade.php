@extends('layout.template')
@section('title')
Crear Retención 
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear Retención
        <small></small>
    </section>


 {!! Form::open(['route'=>'retenciones.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('liquidaciones.forms.liquidacion') 

{!! Form::close() !!}



@stop