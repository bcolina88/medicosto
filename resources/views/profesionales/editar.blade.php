@extends('layout.template')
@section('title')
Editar profesional 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar profesional
        <small></small>
    </section>

 {!! Form::model($profesional, ['route'=>['profesionales.update', $profesional->id], 'method'=>'PUT']) !!}
@include('profesionales.forms.profesional')


{!! Form::close() !!}

@stop