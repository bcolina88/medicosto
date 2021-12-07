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
                 
                     {!! Form::text('federacion_cuota', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
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


	                <div class="col-md-4" >
	                    <label class="hide" id="liquida">
                     
                            <label for="exampleInputPassword1">Liquida Imp. Ganancias</label> 
                     		{!! Form::text('liquida_imp_gana', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
                        </label>
                    

                    </div>


                    <div class="col-md-12">
                     <h3 >Colegio <hr>
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Cuota</label> 
                  
                       {!! Form::text('colegio_cuota', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
	                   
                    </div>

                    <div class="col-md-4"> 
                      <br>
                      <label for="exampleInputPassword1">Alícuota</label> 
                      <div class="form-group">
                        {!! Form::text('colegio_alicuota', null, ['class' => 'form-control', 'placeholder' => '0' ]) !!}
                      </div>     
                    </div> 




                    <div class="col-md-12">
                     <h3 >Otros deducciones <hr>
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Compra materiales</label> 
                  
                       {!! Form::text('compra_materiales', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
	                   
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Seguro Adicional</label> 
                  
                       {!! Form::text('seguro_adicional', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
	                   
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Gtos. Admin. Caja. Prev.</label> 
                  
                       {!! Form::text('gastos_admin', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
	                   
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Aporte Caja. Prev.</label> 
                  
                       {!! Form::text('aporte_caja', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
	                   
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



    $('[name="liquida_imp"]').click(function(){

	      var bb = $('input:radio[name=liquida_imp]:checked').val();


	      if (bb === "true") {
	        $('#liquida').removeClass('hide');
	    
	      }else{
	        $('#liquida').addClass('hide');

	      }

    });


    $('.select2').select2();

    $('#datepicker_fecha').val(moment(new Date()).format("YYYY-MM-DD"))
    
    $('#datepicker_fecha').datetimepicker({
      format: 'YYYY-MM-DD'
    });



  @if ($liquidacion)




      $("#datepicker_fecha").val("{{$liquidacion->fecha}}").trigger('change');

      @if ($liquidacion->liquida_imp  ===1)

         $("#liquida").removeClass("hide");


         document.getElementById('liquida_imp1').checked = true;

      @endif


      @if ($liquidacion->liquida_imp  ===0)
         $("#liquida").addClass("hide");

         document.getElementById('liquida_imp2').checked = true;

      @endif






  @endif



</script>
   
@endsection
