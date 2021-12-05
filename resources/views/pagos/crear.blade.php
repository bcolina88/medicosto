@extends('layout.template')
@section('title')
Pago de Obra Social
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Pago de Obra Social
        <small></small>
    </section>


 {!! Form::open(['route'=>'pagos.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('pagos.forms.pago') 

{!! Form::close() !!}



@stop