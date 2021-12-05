@extends('layout.template')
@section('title')
Editar obra 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar obra
        <small></small>
    </section>

 {!! Form::model($obra, ['route'=>['obras.update', $obra->id], 'method'=>'PUT']) !!}
@include('obras.forms.obra')


{!! Form::close() !!}

@stop