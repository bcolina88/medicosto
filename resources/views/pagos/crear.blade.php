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


 {!! Form::open(['route'=>'pagos.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('pagos.forms.pago') 

{!! Form::close() !!}



@stop