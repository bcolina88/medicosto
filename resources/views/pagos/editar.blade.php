@extends('layout.template')
@section('title')
Editar pago 
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar pago
        <small></small>
    </section>

 {!! Form::model($pago, ['route'=>['pagos.update', $pago->id], 'method'=>'PUT']) !!}
@include('pagos.forms.pago')


{!! Form::close() !!}

@stop