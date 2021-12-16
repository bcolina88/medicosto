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
                     <h3 >% por factura<hr>
                    </div>
                    <br>


                    <div class="col-md-4">
                     
                      <label for="exampleInputPassword1">Federación</label>  <span style="color: #E6674A;">*</span>
                 
                   
                     <input type="text" class="form-control campoTel"  placeholder="0.00" name="factura_federacion" id="factura_federacion" required>




                    </div>



                    <div class="col-md-4">
                     
                      <label for="exampleInputPassword1">Colegio</label>  <span style="color: #E6674A;">*</span>
                 


                        <input type="text" class="form-control campoTel"  placeholder="0.00" name="factura_colegio" id="factura_colegio" required>



                    </div>





	          
                    <div class="col-md-12">
                     <h3 >Cuotas de Socios<hr>
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Federación</label>  <span style="color: #E6674A;">*</span>
                  
                     
                        <input type="text" class="form-control campoTel"  placeholder="0.00" name="federacion_cuota" id="federacion_cuota" required>

                    

                    </div>

                    <div class="col-md-4"> 
                      <br>
                      <label for="exampleInputPassword1">Colegio</label>  <span style="color: #E6674A;">*</span>
                      <div class="form-group">
                       
                        <input type="text" class="form-control campoTel"  placeholder="0.00" name="colegio_cuota" id="colegio_cuota" required>

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
$(function () {

    $('.campoTel').keypress(function (tecla) {
	    if ((tecla.charCode > 57)){
	        // Do something
	       return false;


	    }
	});


});



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


        $("#colegio_cuota").val("{{$liquidacion->colegio_cuota}}").trigger('change');
        $("#federacion_cuota").val("{{$liquidacion->federacion_cuota}}").trigger('change');
        $("#factura_colegio").val("{{$liquidacion->factura_colegio}}").trigger('change');
        $("#factura_federacion").val("{{$liquidacion->factura_federacion}}").trigger('change');



        $("#datepicker_fecha").val("{{$liquidacion->fecha}}").trigger('change');

	    @if ($liquidacion->liquida_imp  == 1)

	        $("#liquida").removeClass("hide");
	        document.getElementById('liquida_imp1').checked = true;

	    @endif


        @if ($liquidacion->liquida_imp  == 0)
         
            $("#liquida").addClass("hide");
            document.getElementById('liquida_imp2').checked = true;

        @endif


  @endif



</script>
   
@endsection
