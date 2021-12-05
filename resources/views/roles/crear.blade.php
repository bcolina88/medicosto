@extends('layout.template')
@section('title')
Crear rol 
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear Rol
        <small></small>
    </section>



@include('roles.forms.role') 




@stop