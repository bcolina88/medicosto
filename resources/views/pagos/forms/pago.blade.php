<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Formulario </h3>
                       <div class="row">
<div class="col-md-9">
  @if ($errors->any())
    <ul>
    <div class="alert alert-warning">
  <b>Corrige Los Siguientes Errores:</b>
  @foreach ($errors->all() as $error)
  <li>
  {{$error}}
</li>
@endforeach
</div>
</ul>

@endif
</div>
</div>
                </div><!-- /.box-header -->
                <!-- form start -->  


                <form role="form">
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                      
                    <div class="col-md-12">
                        <h3 >Fecha: {{$date}}  
                    </div>


                    <div class="col-md-6">
                        <br>
                        <label for="exampleInputPassword1">Liquidación</label> 
                        <select class="form-control select2" id="idliquidacion" name="idliquidacion" style="width: 100%;"></select>
                    

                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="exampleInputPassword1">Profesional</label> 
                        <select class="form-control select2" id="idprofesional" name="idprofesional" style="width: 100%;"> </select>

                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="exampleInputPassword1">Obra Social</label> 
                        <select class="form-control select2" id="idobra" name="idobra" style="width: 100%;"> </select>

                    </div>




                    <div class="col-md-6">
                      <br>
                      <label for="exampleInputPassword1">Importe</label> 
                 
                     {!! Form::text('importe', null, ['class' => 'form-control', 'placeholder' => 'Importe']) !!}
                    </div>


                    <div class="col-md-12">
                      <br>
                      <span style="color: #E6674A;">*</span> Campos Obligatorios
                      <br><br>
                    </div>

                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                  <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">

                
                  <div class="box-footer">


                   <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
                </form>


                 


                 
                
              </div><!-- /.box -->
          </div>

 <div class="clearfix"></div>

@section('javascript')
<script>


    CargarSelects();


    $('.select2').select2();
    $('#datepicker_fecha').val(moment(new Date()).format("YYYY-MM-DD"));
    $('#datepicker_fecha').datetimepicker({
      format: 'YYYY-MM-DD'
    });


  


function CargarSelects(){

    $.ajax({
        url: "{{ route('getCarga') }}",
        type: 'GET',
        dataType: 'json',
    }).done(function(msg) {

      var filap="<option value=''>Seleccione Profesional</option>";
      var filao="<option value=''>Seleccione Obra Social</option>";
      var filal="<option value=''>Seleccione Liquidación</option>";


      msg.profesionales.forEach(function(item) {
         filap+="<option value="+item.id+">"+item.nombre+" "+item.apellido+" - "+item.matricula+"</option>";
      });

      msg.obras.forEach(function(item) {
         filao+="<option value="+item.id+">"+item.nombre+"</option>";
      });

      msg.liquidaciones.forEach(function(item) {
         filal+="<option value="+item.id+">"+item.id+" </option>";
      });

   

      $("#idprofesional").html(filap);
      $("#idobra").html(filao);
      $("#idliquidacion").html(filal);


      @if ($pago)

      
      $("#idprofesional").val("{{$pago->idprofesional}}").trigger('change');     
      $("#idobra").val("{{$pago->idobra}}").trigger('change');     
      $("#idliquidacion").val("{{$pago->idliquidacion}}").trigger('change');     

     
      @endif


    }).fail(function(msg) {});

}







</script>
   
@endsection
