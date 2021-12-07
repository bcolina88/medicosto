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





                    <div class="form-group">

	                    <div class="col-md-6">
	                        <br>
	                        <label for="exampleInputPassword1">Descuento/Retención</label> <span style="color: #E6674A;">*</span>
	                        <select class="form-control select2" id="idliquidacion" name="idliquidacion" style="width: 100%;" required></select>
	                    	<div class="btn-group">
								   <!-- <a class="btn btn-default btn-success fa fa-plus" id='btn-ingresar-cliente'></a>
								    <a class="btn btn-default btn-warning fa fa-pencil" id='btn-editar-cliente'></a>-->
								    <a class="btn btn-default btn-warning fa fa-search" id='btn-ver-cliente'> Totales de control</a>
								    
						    </div>

	                    </div>

	                     <div class="col-md-6">
	                      <br>
	                      <label for="exampleInputPassword1">Importe</label> <span style="color: #E6674A;">*</span>
	                 
	                     {!! Form::text('importe', null, ['class' => 'form-control', 'placeholder' => 'Importe', 'required']) !!}
	                    </div>
                    </div>

                    <div class="col-md-12">
                        <hr >
                    </div>

                    <div class="form-group">

	                    <div class="col-md-6">
	                      	  <br> 
	                        <label for="exampleInputPassword1">Profesional</label> <span style="color: #E6674A;">*</span>
	                        <select class="form-control select2" id="idprofesional" name="idprofesional" style="width: 100%;" required> </select>

	                    </div>

                    <div class="col-md-6">
                     <br> 
                        <label for="exampleInputPassword1">Obras Sociales</label> <span style="color: #E6674A;">*</span>
                        <select class="form-control select2" multiple="multiple" id="obras" name="obras[]" style="width: 100%;" required> </select>

                    </div>
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



   <div class="modal fade" tabindex="-1" role="dialog" id="modal_ver_cliente" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Descuento/Retención</h4>
        </div>
        <div class="modal-body" id="ver-cliente">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-grey" data-dismiss="modal" style="font-size: 14px;">Salir</button>

        </div>
      </div>
    </div>
  </div>



<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

@section('javascript')
<script>


    CargarSelects();


    $('.select2').select2();
    $('#datepicker_fecha').val(moment(new Date()).format("YYYY-MM-DD"));
    $('#datepicker_fecha').datetimepicker({
      format: 'YYYY-MM-DD'
    });




	$('#idprofesional').click(function(){CargarSelects(); });
	$('#obras').click(function(){CargarSelects(); });
	$('#idliquidacion').click(function(){CargarSelects(); });



	$('[name="idliquidacion"]').click(function(){

      CargarSelects();

    });



    $('#btn-ver-cliente').click(function(){

      if ($('#idliquidacion').val()==="") {
          alert("Debe seleccionar un Descuento/Retención");
      }else{ 

          $.ajax({
            url: "{{ route('getDescuento') }}",
            type: 'GET',
            dataType: 'json',
            data: {
              "id": $('[name="idliquidacion"]').val()
            }
          })
          .done(function(msg) {


          	/*if (msg[0].active === 1) {
                var estado = "Activo";
          	}else{
                var estado = "Inhactivo";

          	};*/

            $('#ver-cliente').html('<section class="invoice"> <div class="row"> <div class="col-xs-12"> <h2 class="page-header"> <i class="fa fa-money"> Descuento #'+msg.id+'</i> <small class="pull-right">Fecha: '+msg.fecha+'</small> </h2> </div> </div> <div class="row invoice-info"> <div class="col-sm-6 invoice-col"> <address> <b>Cuota F.O.R.N: </b> $ '+parseFloat(msg.federacion_cuota).toFixed(2)+' <br> <b>Cuota Colegio:</b> $ '+parseFloat(msg.colegio_cuota).toFixed(2)+' <br> <b>Aporte Caja. Prev.:</b> $ '+parseFloat(msg.aporte_caja).toFixed(2)+'<br> <b>Gtos. Admin. Caja. Prev.:</b> $ '+parseFloat(msg.gastos_admin).toFixed(2)+'<br></address> </div> <div class="col-sm-6 invoice-col"> <address>  <b>Alícuota Colegio: </b> $ '+parseFloat(msg.colegio_alicuota).toFixed(2)+'<br> <b>Liquida Imp. Ganancias: </b> $ '+parseFloat(msg.liquida_imp_gana).toFixed(2)+'<br> <b>Compra materiales: </b> $ '+parseFloat(msg.compra_materiales).toFixed(2)+'<br><b>Seguro Adicional: </b> $ '+parseFloat(msg.seguro_adicional).toFixed(2)+'<br></address> </div> </div> </section>');
            $('#modal_ver_cliente').modal('toggle'); 

          })
          .fail(function(msg) {
            console.log("error en selectClientID");
          });

      }
      
    });



  


	function CargarSelects(){

	    $.ajax({
	        url: "{{ route('getCarga') }}",
	        type: 'GET',
	        dataType: 'json',
	    }).done(function(msg) {

	      var filap="<option value=''>Seleccione Profesional</option>";
	      var filao="<option value=''>Seleccione Obras Sociales</option>";
	      var filal="<option value=''>Seleccione Descuento/Retención</option>";


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
	      $("#obras").html(filao);
	      $("#idliquidacion").html(filal);


	      @if ($pago)

	      
		      $("#idprofesional").val("{{$pago->idprofesional}}").trigger('change');     
		     // $("#obras").val("{{$pago->idobra}}").trigger('change');     
		      $("#idliquidacion").val("{{$pago->idliquidacion}}").trigger('change'); 

		        
		      var images = "{{$pago->obras}}"; 
		      var images1 = images.split("[");
		      var images2 = images1[1].split("]");
		      var images3 = images2[0].split(",");

		      

		      //var posicion = arti_creados.indexOf(id);
              //var removed1 = globalItems.splice(posicion, 1);



		     // console.log(images3)
		      /*var text="";

		      for (var i = 0; i < dd.length - 1; i++) {
		         alert(dd[i])
		      };*/

		      //$("#obras").val(images3);




	      @endif


	    }).fail(function(msg) {});

	}







</script>
   
@endsection
