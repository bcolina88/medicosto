@extends('layout.template')
@section('title')
Crear obra 
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear obra
        <small></small>
    </section>


 {!! Form::open(['route'=>'obras.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}



@include('obras.forms.obra') 

{!! Form::close() !!}



@stop