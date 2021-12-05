@extends('layout.template')
@section('title')
Crear profesional 
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear profesional
        <small></small>
    </section>


 {!! Form::open(['route'=>'profesionales.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('profesionales.forms.profesional') 

{!! Form::close() !!}



@stop