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


                   <div class="col-md-12">
                     <h3 >Federación<hr>
                    </div>
                    <br>


                    <div class="col-md-4">
                     
                      <label for="exampleInputPassword1">Cuota</label> 
                 
                     {!! Form::text('federacion_cuota', null, ['class' => 'form-control', 'placeholder' => 'Cuota']) !!}
                    </div>



                    <div class="col-md-4">
                         <br>
	                   
	                    <div class="form-group">
	                          <label>
			                      Liquida Imp. Ganancias
			                    </label>
			                  <div class="radio">
			                    <label>
			                      <input type="radio" name="liquida_imp" id="liquida_imp1" value="true" >
			                      Corresponde
			                    </label>
			                  </div>
			                  <div class="radio">
			                    <label>
			                      <input type="radio" name="liquida_imp" id="liquida_imp2" value="false">
			                      No Corresponde
			                    </label>
			                  </div>
			                  
			            </div>



	                </div>

                    <div class="col-md-12">
                     <h3 >Colegio <hr>
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Cuota</label> 
                  
                       {!! Form::text('colegio_cuota', null, ['class' => 'form-control', 'placeholder' => 'Cuota']) !!}
	                   
                    </div>

                    <div class="col-md-4"> 
                      <br>
                      <label for="exampleInputPassword1">Alícuota</label> 
                      <div class="form-group">
                        {!! Form::text('colegio_alicuota', null, ['class' => 'form-control', 'placeholder' => 'Alícuota' ]) !!}
                      </div>     
                    </div> 


                    <div class="col-md-12">
                       <br><br>
                   
                
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
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
   

@section('javascript')
<script>


$('.select2').select2();

    $('#datepicker_fecha').val(moment(new Date()).format("YYYY-MM-DD"))
    
    $('#datepicker_fecha').datetimepicker({
      format: 'YYYY-MM-DD'
    });



  @if ($liquidacion)

      $("#datepicker_fecha").val("{{$liquidacion->fecha}}").trigger('change');

      @if ($liquidacion->liquida_imp  ===1)

         document.getElementById('liquida_imp1').checked = true;

      @endif


      @if ($liquidacion->liquida_imp  ===0)

         document.getElementById('liquida_imp2').checked = true;

      @endif





  @endif



</script>
   
@endsection
