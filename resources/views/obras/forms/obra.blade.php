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
	                <input type="hidden" name="id" value="0"/>
	                <div class="row">
	                    <div class="col-lg-6" style="margin: 0px;">
	                      <label>Nombre:</label>
	                      <input type="hidden" name="id" id="id">
	                     
                          {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}



	                    </div>
	                </div>
	        

	                 @if ($obra)
	                <div class="row">
	                    <div class="col-lg-6" style="margin: 0px;">

		                    <label>Estatus:</label>
		                      <select class="select2 form-control" name="active" id="active">
		                          <option value="">Seleccione</option>
		                          <option value="0">Inhactivo</option>
		                          <option value="1">Activo</option>
		                         
		                      </select>
		                </div>
	                </div>


  				    @endif

	                <div class="row">
					    <div class="col-lg-12" style="text-align: center;">
					      <div class="box box-solid" >
					        <div class="box-body">
					           <button type="submit" class="btn btn-primary"> Enviar</button>
					        </div>
					      </div>
					    </div>
					  </div>


	               
	              </div>             
	              


                  <div class="box-footer">
                  </div>
                  </div>
                
              </div><!-- /.box -->
          </div>

 <div class="clearfix"></div>
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
   

@section('javascript')
<script>



 @if ($obra)
 
      $("#id").val("{{$obra->id}}").trigger('change');     
      $("#active").val("{{$obra->active}}").trigger('change');     
    

  @endif



</script>
   
@endsection
