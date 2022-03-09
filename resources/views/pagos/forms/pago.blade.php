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



                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">



                    <div class="form-group">

	                    <div class="col-md-6">
	                        <br>
	                        <label for="exampleInputPassword1">Retención</label> <span style="color: #E6674A;">*</span>
	                        <select class="form-control select2" id="idliquidacion" name="idliquidacion" style="width: 100%;" required onchange="cambio();"></select>


	                    	<div class="btn-group">
								   <!-- <a class="btn btn-default btn-success fa fa-plus" id='btn-ingresar-cliente'></a>
								    <a class="btn btn-default btn-warning fa fa-pencil" id='btn-editar-cliente'></a>-->
								    <a class="btn btn-default btn-warning fa fa-search" id='btn-ver-cliente'> Totales de control</a>

						    </div>

	                    </div>

	                 


	                    <div class="col-md-6">
		                    <br>
		                    <label for="exampleInputPassword1">Fecha</label> 
		                 
		            
		                    <input type="text" class="form-control" name="fecha" id="datepicker_inicio">
                        
                        </div>

                   




                    </div>

                    <div class="col-md-12">
                        <hr >
                    </div>

                    <div class="form-group">

	                    <div class="col-md-6">
	                      	  <br>
	                        <label for="exampleInputPassword1">Obra</label> <span style="color: #E6674A;">*</span>
	                        <select class="form-control select2" id="idobra" name="idobra" style="width: 100%;" required> </select>

	                    </div>

                    <div class="col-md-6">
                     <br>
                       <!--  <label for="exampleInputPassword1">Obras Sociales</label> <span style="color: #E6674A;">*</span>
                       <select class="form-control select2" multiple="multiple" id="obras" name="obras[]" style="width: 100%;" required> </select>
-->
						<a class="btn btn-default btn-primary" id='btn-agregar-descuento' style="color: #fff;"> Agregar Descuentos</a>

                    </div>
                    </div>


                    <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered table-hover table-responsive" id="table-articulos">
                <thead>
                <tr>
                  <th style="width: 90px;">Nombre del Profesional</th>
                  <th style="width: 50px;">Total de Fact. de Odont.</th>
                  <th style="width: 50px;">% de cobro de factura por federación</th>
                  <th style="width: 50px;">Total</th>
                  <th style="width: 50px;">Acciones</th>
                </tr>
                </thead>
                <tbody >
                  <tr style="background-color: transparent;">


                  </tr>
                </tbody>

          </table>
          <td colspan="7">
                      <p id="mensaje" name="mensaje" class="alert alert-info text-center " >No hay profesionales.</p>
                      <br>
                      <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                {!! Form::label('profesionales', 'Profesionales:') !!}
                            </div>
                            <div class="col-sm-8">
                               <select class="form-control select2" id="profesionales" name="profesionales" style="width: 100%;" required> </select>


                            </div>
                            <br><br>
                        </div>
                      </div>
          </td>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">



        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Monto adeudado  </p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total Pagos:</th>
                <td>$ <span id="sub_total">0.00</span></td>
              </tr>
              <tr>
                <th> Alícuota colegio (<span id="porcentaje">0</span>%):</th>
                <td>$ <span id="ivaa">0.00</span></td>
              </tr>
               <tr>
                <th>Descuento:</th>
                <td><input type="text" class="form-control" id="descuento" name="descuento" value="0.00" onchange="totalGeneral();" placeholder="0.00" style="width: 100px;" ></td> </tr>
              <tr>
                <th>Total Liquidación:</th>
                <td>$ <b><span id="total_general">0.00</span></b></td>
                <input type="text" class="form-control hide" id="total_general_g" name="total_general_g"  >
                <input type="text" class="form-control hide" id="total_general_t" name="total_general_t"  >

              </tr>
            </table>
          </div>
        </div>

        <!-- /.col -->
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


                   <button id="ingresar" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>








              </div><!-- /.box -->
          </div>

 <div class="clearfix"></div>



   <div class="modal fade" tabindex="-1" role="dialog" id="modal_ver_cliente" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Retención</h4>
        </div>
        <div class="modal-body" id="ver-cliente">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-grey" data-dismiss="modal" id="salir_ver_cliente" style="font-size: 14px;">Salir</button>

        </div>
      </div>
    </div>
  </div>


   <div class="modal fade" tabindex="-1" role="dialog" id="modal_agregar-descuento" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" id="titulo-orden">
           <h4 class="modal-title">Agregar descuento</h4>

        </div>
        <div class="modal-body" >

            <div class="box-body">
		            <div class="col-md-6">
			            <div class="form-group">
			                      {!! Form::label('nombre', 'Nombre') !!}
			                      <div class="input-group">
							            <div class="input-group-addon">
				                    <i class="fa fa-money"></i>
				                  </div>
			                         <input type="text" class="form-control" name="nombre_descuento" id="nombre_descuento" required placeholder='Nombre'>

			                    </div>
			            </div>
		            </div>

		            <div class="col-md-6">
			            <div class="form-group">
			                      {!! Form::label('valor', 'Valor') !!}
			                      <div class="input-group">
					                <div class="input-group-addon">
		                             <i class="fa fa-money"></i>
                      			   </div>
			                        <input type="text" class="form-control campoTel" name="importe_descuento" id="importe_descuento" required placeholder='0.00'>

			                    </div>
			            </div>
		            <button type="button" class="btn btn-primary" style="font-size: 14px;color: #fff;" id="agrega_descuento">Enviar</button>
			              <br><br>
		            </div>





		    	    <!-- Table row -->
				    <div class="row">
				        <div class="col-xs-12 table-responsive">
				          <table class="table table-bordered table-hover table-responsive" id="table-descuentos">
				                <thead>
				                <tr>
				                  <th style="width: 90px;">Nombre</th>
				                  <th style="width: 50px;">Valor</th>

				                  <th style="width: 50px;">Acciones</th>
				                </tr>
				                </thead>
				                <tbody >
				                  <tr style="background-color: transparent;">


				                  </tr>
				                </tbody>

				          </table>
				          <td colspan="7">
				                      <p id="mensaje_d" name="mensaje_d" class="alert alert-info text-center " >No hay descuentos.</p>
				                      <br>
				          </td>

				        </div>
				        <!-- /.col -->
				    </div>
				    <!-- /.row -->
           <h4 class="modal-title">Total descuento: $ <b><span id="total_descuento"></span></b></h4>



        </div>
        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-light-grey" data-dismiss="modal" style="font-size: 14px;" id="salir_descuento">Salir</button>

        </div>
      </div>
    </div>
  </div>



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





	var globalItems = [];
	var globalDescuento = [];
	var articulos = [];
	var totales = [];
	var arti_creados = [];
	var descuento_creados = [];
	var i = 1;
	var sub_total = [];
	var suma = 0.00;
	var sumaD = 0.00;
	var sub_totall;

	var kk=1;
	var cuotas = false;


	var numero = 0;
	var porcentaje = 0;


    document.getElementById('total_descuento').innerHTML = parseFloat(sumaD).toFixed(2);


    CargarSelects();


    $('.select2').select2();
    $('#datepicker_inicio').datetimepicker({format: 'DD-MM-YYYY'});

    $('#datepicker_fecha').val(moment(new Date()).format("YYYY-MM-DD"));
    $('#datepicker_fecha').datetimepicker({
      format: 'YYYY-MM-DD'
    });


    @if ($pago)

    numero = {{$pago->id}};
	cuotas = true;



    document.getElementById('sub_total').innerHTML = parseFloat('{{$pago->subtotal}}').toFixed(2);
   // document.getElementById('ivaa').innerHTML = '{{$pago->iva}}';
   //document.getElementById('total_general').innerHTML = 1;
    $("#descuento").val({{$pago->descuento}}).trigger('change');
   // $("#ivaa").val({{$pago->iva}}).trigger('change');


   // $('[name="importe"]').val({{$pago->importe}}).trigger('change');


    $.ajax({
        url: "{{ route('getPagosItems') }}",
        type: 'GET',
        dataType: 'json',
        data: {
          "id": {{$pago->id}}
        }
      })
      .done(function(msg) {

        var ii=0;



        msg.obras.forEach(function(item) {

          var iva = item.iva;
          sub_totall = item.sub_total;
          var total_general = item.total_general;

            if(!articulos.includes(item.id)) {


                $("#mensaje").hide();

                $('#table-articulos tbody').append('<tr>'+

                  '<td style="width: 90px;">'+ item.nombre +'</td>'+
                  '<td> <input type="text" class="form-control" style="width: 70px;" min="1" id="cantidad'+ i+'" name="cantidad'+ i+'" value="1" onchange="sumar('+ item.id +',this.value,'+ i+');"  > </td>'+
                  '<td> <input type="text" class="form-control" style="width: 70px;" id="precio'+i+'" name="precio'+ i+'" value="'+ item.precio+'" onchange="precio('+i+','+ item.id +');" ></td>'+
                  '<td> <span id="spTotal'+ i+'"></span></td>'+
                  '<td align="center"><button class="btn btn-danger btn-xs" onclick="eliminarArticulo(this,'+ item.id +');"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                  '</tr>');


                 $("#cantidad"+i).val(item.cantidad).trigger('change');
                //$("#precio"+i).val(item.precio).trigger('change');

                 // porcentaje=parseFloat(item.iva).toFixed(2);
                  //item.iva;

                  //console.log({{$pago->iva}});
                 //$("#porcentaje").val(1).trigger('change');

                  document.getElementById('porcentaje').innerHTML = item.retencion.factura_colegio;
                  porcentaje = item.retencion.factura_colegio;
                  //document.getElementById('spTotal'+i).innerHTML = parseFloat(item.total).toFixed(2);


                  $("#importe"+i).val(item.cantidad).trigger('change');

                  i++;

                  globalItems.push(item);
                  articulos.push(item.id);

            }

            document.getElementById('ivaa').innerHTML = {{$pago->iva}};


        });


        document.getElementById('total_general').innerHTML = parseFloat('{{$pago->total}}').toFixed(2);
       // porcentaje= parseFloat('{{$pago->iva}}').toFixed(2);




        msg.descuentos.forEach(function(item) {


	       	 var atem ={};
             atem.nombre = item.nombre;
             atem.importe = parseFloat(item.valor).toFixed(2);


	          $("#mensaje_d").hide();

              $('#table-descuentos tbody').append('<tr>'+

                  '<td style="width: 90px;">'+ item.nombre +'</td>'+
                  '<td style="width: 90px;">'+ item.valor +'</td>'+

                  '<td align="center"><button class="btn btn-danger btn-xs" onclick="eliminarDescuento(this,'+ kk +');"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                  '</tr>');



                globalDescuento.push(atem);
                descuento_creados.push(kk);

                sumarDescuento();

                kk++;

        });

                  document.getElementById('ivaa').innerHTML = {{$pago->iva}};




      })
      .fail(function(msg) {
        console.log("error en getAlbaranesItems");
      });





    @endif


	//$('#idprofesional').click(function(){CargarSelects(); });
	$('#agrega_descuento').click(function(){

		var nombre_descuento = $('#nombre_descuento').val();
		var importe_descuento = $('#importe_descuento').val();

		$('#nombre_descuento').val('');
		$('#importe_descuento').val('');

		selectDescuento(nombre_descuento,importe_descuento);

	});



	$('[name="profesionales"]').on('select2:select', function (e) {

		  if ($('#idliquidacion').val()==="") {


              $('#profesionales').val('').trigger('change');
               alert("Debe seleccionar una Retención");



	      }else{

	      	 var retencion = $('#idliquidacion').val();

	      	 var data = e.params.data;
        	 selectArticleID(data.id,retencion);
	      }

    });


    $('#salir_ver_cliente').click(function(){

        CargarRetencion();


    });





    $('#btn-agregar-descuento').click(function(){


    	if ($('#idliquidacion').val()==="") {

           alert("Debe seleccionar un Retención");

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

	        	@if (!$pago)

	        	      if (!cuotas) {

	        	      	selectDescuento("Cuota F.O.R.N.",msg.federacion_cuota);
		        	    selectDescuento("Cuota Colegio",msg.colegio_cuota);
		        	    cuotas=true;


	        	      };
	        	    
		        		

	        	@endif



	          $('#modal_agregar-descuento').modal('toggle');


	        })
	        .fail(function(msg) {
	            console.log("error en getDescuento");
	        });


	    }


    });

    $('#btn-ver-cliente').click(function(){

      if ($('#idliquidacion').val()==="") {
          alert("Debe seleccionar una Retención");
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


            $('#ver-cliente').html('<section class="invoice"> <div class="row"> <div class="col-xs-12"> <h2 class="page-header"> <i class="fa fa-archive"> Retención #'+msg.id+'</i> <small class="pull-right">Fecha: '+msg.fecha+'</small> </h2> </div> </div> <div class="row invoice-info"> <div class="col-sm-6 invoice-col"> <address> <b> % por fact. de Colegio: </b> '+parseFloat(msg.factura_colegio).toFixed(2)+' <br> <b>% por fact. de Federación:</b> '+parseFloat(msg.factura_federacion).toFixed(2)+' <br> <br></address> </div> <div class="col-sm-6 invoice-col"> <address>  <b>Cuota de Socios Federación: </b> $ '+parseFloat(msg.federacion_cuota).toFixed(2)+'<br> <b>Cuota de Socios Colegio: </b> $ '+parseFloat(msg.colegio_cuota).toFixed(2)+'<br> </address> </div> </div> </section>');
            $('#modal_ver_cliente').modal('toggle');

          })
          .fail(function(msg) {
            console.log("error en selectClientID");
          });

      }

    });


	$('#ingresar').click(function(){
      var tipo = "guardar";
      agregarOrden(tipo);

    });


	function CargarSelects(){

	    $.ajax({
	        url: "{{ route('getCarga') }}",
	        type: 'GET',
	        dataType: 'json',
	    }).done(function(msg) {

	      var filap="<option value=''>Seleccione Profesional</option>";
	      var filao="<option value=''>Seleccione Obra Social</option>";
	      var filal="<option value=''>Seleccione Retención</option>";


	      msg.profesionales.forEach(function(item) {
	         filap+="<option value="+item.id+">"+item.nombre+" "+item.apellido+" - "+item.matricula+"</option>";
	      });

	      msg.obras.forEach(function(item) {
	         filao+="<option value="+item.id+">"+item.nombre+"</option>";
	      });

	      msg.liquidaciones.forEach(function(item) {
	         filal+="<option value="+item.id+">"+item.id+" </option>";
	      });



	      $("#profesionales").html(filap);
	      $("#idobra").html(filao);
	      $("#idliquidacion").html(filal);



	      @if ($pago)


		      $("#idobra").val("{{$pago->idobra}}").trigger('change');
		      $("#idliquidacion").val("{{$pago->idliquidacion}}").trigger('change');


		     /* var images = "{{$pago->obras}}";
		      var images1 = images.split(",");
		      var ii=[];

		      for (var i = 0; i < images1.length; i++) {
		      	  ii.push(images1[i])
		      };

		      $("#obras").val(ii);*/



	      @endif


	    }).fail(function(msg) {});

	}

	function CargarRetencion(){

		var tt = $('#idliquidacion').val();


	    $.ajax({
	        url: "{{ route('getCarga') }}",
	        type: 'GET',
	        dataType: 'json',
	    }).done(function(msg) {


	      var filal="<option value=''>Seleccione Retención</option>";

	      msg.liquidaciones.forEach(function(item) {
	         filal+="<option value="+item.id+">"+item.id+" </option>";
	      });


	      $("#idliquidacion").html(filal);
          $("#idliquidacion").val(tt);


	    }).fail(function(msg) {});

	}



	function selectArticleID(id,retencion){
      $.ajax({
        url: "{{ route('getObra') }}",
        type: 'GET',
        dataType: 'json',
        data: {
          "id": id,
          "retencion" : retencion,
        }
      })
      .done(function(msg) {

        msg.forEach(function(item) {
        //agregamos los items a la tabla.



          if(!articulos.includes(item.id)) {


              $("#mensaje").hide();

              $('#table-articulos tbody').append('<tr>'+

                  '<td style="width: 90px;">'+ item.nombre +'</td>'+
                  '<td> <input type="text" class="form-control" style="width: 70px;" min="1" id="cantidad'+ i+'" name="cantidad'+ i+'" value="1" onchange="sumar('+ item.id +',this.value,'+ i+');"  > </td>'+
                  '<td> <input type="text" class="form-control" style="width: 70px;" id="precio'+i+'" name="precio'+ i+'" value="'+ item.retencion.factura_federacion+'" onchange="precio('+i+','+ item.id +');" ></td>'+
                  '<td> <span id="spTotal'+ i+'"></span></td>'+
                  '<td align="center"><button class="btn btn-danger btn-xs" onclick="eliminarArticulo(this,'+ item.id +');"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                  '</tr>');

                  $('#cantidad'+i).trigger('change');
                  i++;


          	    porcentaje=item.retencion.factura_colegio;
                document.getElementById('porcentaje').innerHTML = parseFloat(porcentaje).toFixed(0);


                globalItems.push(item);
                articulos.push(item.id);
          }


        });


      })
      .fail(function(msg) {
        console.log("error en selectArticleID");
      });
    }


    function eliminarArticulo(element,id){


	      var item = $(element).closest("tr").find('[name="td-hidden"]').text();

	      var posicion = arti_creados.indexOf(id);
	      var removed1 = globalItems.splice(posicion, 1);
	      var removed2 = articulos.splice(posicion, 1);
	      var removed3 = totales.splice(posicion, 1);


	      var removed4 = arti_creados.splice(posicion, 1);


	      $(element).parent().parent().remove();
	      if(globalItems.length === 0) {
	        	$("#mensaje").show();
	        	$("#articulo").val("").trigger('change');
	      }
	      subTotal();

    }


    function eliminarDescuento(element,id){


	      var item = $(element).closest("tr").find('[name="td-hidden"]').text();

	      var posicion = descuento_creados.indexOf(id);
	      var removed1 = globalDescuento.splice(posicion, 1);
	      var removed2 = descuento_creados.splice(posicion, 1);



	      $(element).parent().parent().remove();
	      if(globalDescuento.length == 0) {
	        	$("#mensaje_d").show();
	      }

          sumarDescuento();


    }


    function sumar (id,valor,i) {

        var total = 0;

        var articulo ={};
        var precio = $('[name="precio'+i+'"]').val();




        valor = parseFloat(valor); // Convertir el valor a un entero (número).
        total = document.getElementById('spTotal'+ i).innerHTML;
        // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
        total = (total == null || total == undefined || total == "") ? 0 : total;
        /* Esta es la multiplicacion. */
        total = (parseFloat(valor) * parseFloat(precio)/100);

        ww = parseFloat(valor).toFixed(2) - parseFloat(total).toFixed(2);
        // Colocar el resultado de la multiplicacion en el control "spTotal".
        document.getElementById('spTotal'+i).innerHTML = parseFloat(ww).toFixed(2);


        if(!arti_creados.includes(id)) {

            articulo.id = id;
            articulo.cantidad = parseFloat(valor);
            articulo.total = parseFloat(ww).toFixed(2);
            articulo.precio = parseFloat(precio);
            totales.push(articulo);
            arti_creados.push(id);


        }else{

            var posicion = arti_creados.indexOf(id);
            var removed1 = totales.splice(posicion, 1);
            var removed2 = arti_creados.splice(posicion, 1);

            articulo.id = id;
            articulo.cantidad = parseFloat(valor);
            articulo.total = parseFloat(ww).toFixed(2);
            articulo.precio = parseFloat(precio);

            totales.push(articulo);
            arti_creados.push(id);

        }

        subTotal();


    }

    function subTotal(){

	  if(totales.length > 0){
	    for( var j=0; j < totales.length;j++){
	            suma = parseFloat(suma) + parseFloat(totales[j].total);
	    }
	  }

	  document.getElementById('sub_total').innerHTML = parseFloat(suma).toFixed(2);
	  var total = document.getElementById('sub_total').innerHTML;
	  $("#sub_total").val(total);
	  suma= 0.00;

	  totalGeneral();

    }


    function totalGeneral(){

	    var descuento = $("#descuento").val();
	    var total = $("#sub_total").val();
	    //var total = document.getElementById('sub_total').innerHTML;

	      console.log(porcentaje);






	    var porce = parseFloat(parseFloat(porcentaje)/100).toFixed(2);


	    if (descuento!="") {

	      //var total = $("#total_general_t").val();

	      total1 = parseFloat(total).toFixed(2) ;

	      document.getElementById('total_general').innerHTML = parseFloat(total1).toFixed(2);
	      document.getElementById('ivaa').innerHTML = parseFloat(parseFloat(total1) * parseFloat(porce)).toFixed(2);


	      var iva = parseFloat(parseFloat(total1) * parseFloat(porce)).toFixed(2);


	      var retencion = parseFloat(parseFloat(iva) + parseFloat(descuento)).toFixed(2);

	      var total_general = parseFloat(total).toFixed(2);

	      document.getElementById('sub_total').innerHTML = parseFloat(total_general).toFixed(2);
	      document.getElementById('total_general').innerHTML = parseFloat(parseFloat(total_general) - parseFloat(retencion)).toFixed(2);




	    }else{

	      var total = document.getElementById('sub_total').innerHTML;
	     // console.log(total);
	     //document.getElementById('sub_total').innerHTML = parseFloat(parseFloat(total) / parseFloat(1.19)).toFixed(2);
	     // document.getElementById('total_general').innerHTML = $("#total_general_t").val();
	     // document.getElementById('sub_total').innerHTML = parseFloat(parseFloat($("#total_general_t").val()) / parseFloat(1.19)).toFixed(2);
	     // document.getElementById('sub_total').innerHTML = parseFloat(parseFloat($("#total_general_t").val()) / parseFloat(0.08)     ).toFixed(2);
	      total1 = parseFloat(total).toFixed(2) ;

	      document.getElementById('ivaa').innerHTML = parseFloat(parseFloat(total1) * parseFloat(porce)  ).toFixed(2);

	      var iva     = parseFloat(parseFloat(total1) * parseFloat(porce)).toFixed(2);

		  var total_general = parseFloat(total).toFixed(2);

	      document.getElementById('sub_total').innerHTML = parseFloat(total_general).toFixed(2);
	      document.getElementById('total_general').innerHTML = parseFloat(parseFloat(total_general) - parseFloat(iva)).toFixed(2);




	    }
    }


    function agregarOrden(tipo){

	  var sub_total = document.getElementById('sub_total').innerHTML;

	  var ivaa = document.getElementById('ivaa').innerHTML;
	  var total_general = document.getElementById('total_general').innerHTML;
	  var cantidad_vacia=false;
	  var descuento = $('[name="descuento"]').val();
	  var i=1;



	   sub_total = parseFloat(sub_total);
	   ivaa = parseFloat(ivaa);
	   total_general = parseFloat(total_general);
	   descuento = parseFloat(descuento);



	  if (!articulos.length >0) {

	    if ($('#profesionales').val()==="") {
	        alert("Debe seleccionar al menos un profesional");
	    };

	  };


	  while (i <= articulos.length) {


	      if($('#cantidad'+i).val()===""){
	        cantidad_vacia=false;
	        alert("coloque total facturacion de odontólogo de cada obra seleccionada");
	      }else{
	        cantidad_vacia=true;
	      }
	      i++;

	  };


	  if (($('#importe').val()!="")&&($('#idprofesional').val()!="")&&($('#idliquidacion').val()!="")&& (cantidad_vacia)) {

	      if(tipo ==="guardar"){


	      	$.ajax({
	          url: "{{ route('liquidaciones.store') }}",
	          type: "POST",
	          dataType: 'json',
	          contentType: 'application/json',
	          data: JSON.stringify({
	            "_token":         "{{ csrf_token() }}",
	            "idliquidacion":  $('[name="idliquidacion"]').val(),
	            "importe":        $('[name="importe"]').val(),
	            "idobra":         $('[name="idobra"]').val(),
	            "fecha":          $('[name="fecha"]').val(),
	            "iva":            ivaa,
	            "descuento":      descuento,
	            "subtotal":       sub_total,
	            "total":          total_general,
	            "profesionales" : totales,
	            "descuentos" :    globalDescuento,
                "tipo":          "{{$tipo}}",
                "id":             numero,


	          })
	        })
	        .done(function(msg) {

	            var message = 'La liquidación Fue creada correctamente';
	            window.location.href = "{{ route('liquidaciones.index') }}";


	        })
	        .fail(function(msg) {

	        });


	      };


	  };

    }


    function cambio(){

    	    globalItems = [];

			articulos = [];
			totales = [];
			arti_creados = [];
			i = 1;
			sub_total = [];
			suma = 0.00;
			sub_totall;

			//numero = 0;
			porcentaje = 0;
	        cuotas=false;
	        globalDescuento = [];
            descuento_creados = [];


            $('#table-articulos tbody tr').remove();
            $('#table-descuentos tbody tr').remove();
            $("#mensaje").show();
            $("#mensaje_d").show();

            subTotal();

            $("#profesionales").val('').trigger('change');

            document.getElementById('porcentaje').innerHTML = parseFloat(porcentaje).toFixed(0);
            document.getElementById('descuentos').innerHTML = parseFloat(0.00).toFixed(0);





    }


    function sumarDescuento () {

      if(globalDescuento.length > 0){
	    for( var j=0; j < globalDescuento.length;j++){
	            sumaD = parseFloat(sumaD) + parseFloat(globalDescuento[j].importe);
	    }
	  }

	  document.getElementById('total_descuento').innerHTML = parseFloat(sumaD).toFixed(2);
	  //document.getElementById('descuento').innerHTML = parseFloat(sumaD).toFixed(2);
	  //var total = document.getElementById('total_general').innerHTML;
	  $("#descuento").val(parseFloat(sumaD).toFixed(2));
	  sumaD= 0.00;

	  subTotal();



    }





    function selectDescuento(nombre,importe){



    		 var item ={};
             item.nombre = nombre;
             item.importe = parseFloat(importe).toFixed(2);


              $("#mensaje_d").hide();

              $('#table-descuentos tbody').append('<tr>'+

                  '<td style="width: 90px;">'+ nombre +'</td>'+
                  '<td style="width: 90px;">'+ importe +'</td>'+

                  '<td align="center"><button class="btn btn-danger btn-xs" onclick="eliminarDescuento(this,'+ kk +');"><i class="fa fa-times" aria-hidden="true"></i></button></td>'+
                  '</tr>');



                globalDescuento.push(item);
                descuento_creados.push(kk);

                sumarDescuento();

                kk++;



    }





</script>

@endsection
