<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <section class="content-header">
      <h1>
        Información personal <br>
    </section>
                  <hr>
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
                      
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Nombre</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                    </div>

              

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Apellido</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido', 'required']) !!}
                    </div>

                     <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Matricula</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('matricula', null, ['class' => 'form-control', 'placeholder' => 'Matricula', 'required']) !!}
                    </div>


                   <div class="col-md-12">
                     <h3 >Domicilio / Otros datos<hr>
                    </div>
                    <br>


                    <div class="col-md-4">
                     
                      <label for="exampleInputPassword1">Calle</label> 
                 
                     {!! Form::text('calle', null, ['class' => 'form-control', 'placeholder' => 'Calle']) !!}
                    </div>

                    <div class="col-md-4"> 

                      <label for="exampleInputPassword1">Numero</label> 

                    

                      <div class="form-group">
            
                        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                      </div>     
                    </div> 


                    <div class="col-md-4">
                     
                      <label for="exampleInputPassword1">Código postal</label> 
                 
                     {!! Form::text('codigo_postal', null, ['class' => 'form-control', 'placeholder' => 'Código postal']) !!}
                    </div>


                     <div class="col-md-12">
                       <br>
                      <label for="exampleInputPassword1">Datos complementarios</label> 
                  
                       {!! Form::text('datos_complementarios', null, ['class' => 'form-control', 'placeholder' => 'Datos complementarios']) !!}
                    </div>


                    
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Fecha de nacimiento</label> 
                 
            
                    <input type="text" class="form-control" name="fecha_nacimiento" id="datepicker_nacimiento">
                        
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Lugar</label> 
                 
                     {!! Form::text('lugar', null, ['class' => 'form-control', 'placeholder' => 'Lugar']) !!}
                    </div>

                    <div class="col-md-4">
                        <br>
                        <label for="exampleInputPassword1">Telefono</label> 
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '(0000) 00-0000', 'data-inputmask'=>'"mask": "(9999) 99-9999"','data-mask']) !!}

                    </div> 


                    <div class="col-md-12">
                     <h3 >Datos Impositivos <hr>
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">CUIT</label> <span style="color: #E6674A;">*</span>
                  
                       {!! Form::text('cuit', null, ['class' => 'form-control', 'placeholder' => '00-00000000-0', 'data-inputmask'=>'"mask": "99-99999999-9"','data-mask', 'required']) !!}
	                   
                    </div>

                    <div class="col-md-4"> 
                      <br>
                      <label for="exampleInputPassword1">Ingresos Brutos</label> 
                      <div class="form-group">
                        {!! Form::text('ingreso_bruto', null, ['class' => 'form-control', 'placeholder' => '' ]) !!}
                      </div>     
                    </div> 


                    <div class="col-md-4"> 
                      <br>
                      <label for="exampleInputPassword1">Tipo Ingr. Br.</label> 
                      <div class="form-group">
                        {!! Form::text('tipo_ingreso_bruto', null, ['class' => 'form-control', 'placeholder' => '' ]) !!}
                      </div>     
                    </div> 



                    <div class="col-md-4">
                        <br>
                        <label for="exampleInputPassword1">Condición ante IVA</label> 
                        <select class="form-control select2" id="cond_iva" name="cond_iva" required style="width: 100%;">

                          <option value="">Seleccione condición ante IVA</option>
                          <option value="Monotributista">Monotributista</option>
                          <option value="Responsable Inscripto">Responsable Inscripto</option>

            
                        </select>
                    

                    </div>


                    <div class="col-md-4">
                        <br>
                        <label for="exampleInputPassword1">Fecha ingreso a C.O.C</label>  
                        <input type="text" class="form-control" name="fecha_ingreso_coc" id="datepicker_ingreso_coc" >
                    </div>


                    <div class="col-md-4">
                         <br><br>
	                     <div class="form-group">
			                  <div class="checkbox">
			                    <label>
			                      <input type="checkbox" id="retiene_ganancia" name="retiene_ganancia">
			                      Retiene Ganancias?
			                    </label>
			                  </div>
	                     </div>
	                </div>

                      
                    <div class="col-md-12">
                     <h3 >Datos bancarios <hr>
                    </div>
                    <br>


                    <div class="col-md-4">
                   

                      <div class="form-group">
                        {!! Form::label('banco', 'Banco') !!} 

                      
                        {!! Form::text('banco', null, ['class' => 'form-control', 'placeholder' => '' ]) !!}
                        

                      </div>     
                    </div>  


                    <div class="col-md-4">
                   
                      <label for="exampleInputPassword1">Tipo de cuenta</label>  

                         
                        <select class="form-control select2" id="tipo_cuenta" name="tipo_cuenta" required style="width: 100%;">

   
                          <option value="">Seleccione tipo de cuenta</option>
                          <option value="Caja de ahorro en pesos">Caja de ahorro en pesos</option>
                          <option value="Caja de ahorro en dolares">Caja de ahorro en dolares</option>
                          <option value="Cuenta corriente en pesos">Cuenta corriente en pesos</option>
                          <option value="Cuenta corriente en dolares">Cuenta corriente en dolares </option>
                          
                        

                        </select>

                    </div>


                    <div class="col-md-4">
                   
                      <label for="exampleInputPassword1">Numero de Cuenta</label> 
                 
                     {!! Form::text('num_cuenta', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                    </div>



                    <div class="col-md-12">
                     <h3 >Suspención<hr>
                    </div>
                    



                    <div class="col-md-4">
                        <label for="exampleInputPassword1">Fecha desde</label>  
                        <input type="text" class="form-control" name="fecha_desde" id="datepicker_desde" >
                    </div>

             

                    <div class="col-md-4">
                        <label for="exampleInputPassword1">Fecha hasta</label> 
                        <input type="text" class="form-control" name="fecha_hasta" id="datepicker_hasta" >   
                    </div>

                     @if ($profesional)


                          <div class="col-md-4">
                            
                            <label for="exampleInputPassword1">Estado</label> 
    
                              <select class="form-control select2" id="estado" name="estado" style="width: 100%;">
                                <option value="">Seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inhactivo</option>
                              </select>
                              
                          </div>

                    @endif


                    <div class="col-md-12">
                       <br>
                      <label for="exampleInputPassword1">Comentarios</label> 
                  
                       {!! Form::text('comentarios', null, ['class' => 'form-control', 'placeholder' => 'Comentarios']) !!}
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

  <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
@section('javascript')

<script>

   
  $('[data-mask]').inputmask()

    $('.select2').select2();

    $('#datepicker_nacimiento').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_desde').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_hasta').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datepicker_ingreso_coc').datetimepicker({
      format: 'YYYY-MM-DD'
    });



  @if ($profesional)
      $("#datepicker_nacimiento").val("{{$profesional->fecha_nacimiento}}").trigger('change');
      $("#datepicker_desde").val("{{$profesional->fecha_desde }}").trigger('change');
      $("#datepicker_hasta").val("{{$profesional->fecha_hasta}}").trigger('change');
      $("#datepicker_ingreso_coc").val("{{$profesional->fecha_ingreso_coc}}").trigger('change');
      $("#cond_iva").val("{{$profesional->cond_iva}}").trigger('change');
      $("#estado").val("{{$profesional->active}}").trigger('change');
      $("#tipo_cuenta").val("{{$profesional->tipo_cuenta}}").trigger('change');
     

      @if ($profesional->retiene_ganancia  ===1)

        // $("#retiene_ganancia").removeClass("hide");
         document.getElementById('retiene_ganancia').checked = true;

      @endif

      @if ($profesional->retiene_ganancia  ===0)

         //$("#retiene_ganancia").addClass("hide");
         document.getElementById('retiene_ganancia').checked = false;

      @endif


  @endif






</script>
@endsection
