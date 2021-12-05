@extends('layout.template')
@section('title')
Crear Liquidación 
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear Liquidación
        <small></small>
    </section>


 {!! Form::open(['route'=>'liquidaciones.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('liquidaciones.forms.liquidacion') 

{!! Form::close() !!}



@stop