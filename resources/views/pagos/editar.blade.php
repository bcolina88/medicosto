@extends('layout.template')
@section('title')
Editar Liquidación 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Liquidación
        <small></small>
    </section>

 {!! Form::model($pago, ['route'=>['pagos.update', $pago->id], 'method'=>'PUT']) !!}
@include('pagos.forms.pago')


{!! Form::close() !!}

@stop