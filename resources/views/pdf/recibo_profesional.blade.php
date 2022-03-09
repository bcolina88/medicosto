@extends('layout')
@section('css')
  <style media="screen">

    .pull-left {
        float: left !important;
    }

    .pull-right {
        float: right !important;
    }


    .table>tbody>tr>td {
        border-top: 1px solid #fff;
        padding: 0px;
    }

    .table>thead>tr>th {
        border-bottom: 2px solid #fff;
        padding: 0px;
    }

    .table>tbody>tr>th {
        border-bottom: 2px solid #fff;
        padding: 0px;
    }

    .table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td {
	  padding: 0px;

	}


	.table-condensed > thead > tr > th,
	.table-condensed > tbody > tr > th,
	.table-condensed > tfoot > tr > th,
	.table-condensed > thead > tr > td,
	.table-condensed > tbody > tr > td,
	.table-condensed > tfoot > tr > td {
	  padding: 0px;
	}


}

  </style>
@endsection

@section('content')

    <div class="col-md-12" style="font-size: 10px;line-height: 0.5">
        <div class="">
            
            <h2><b>Colegio Odontológico de Cipolletti</b></h2>
            <p>Sarmiento 336 - T. 4782952 - (8324) Cipolletti - R.N.</p>
            <p>Pers.Jur.Dto.731/84 - C.U.I.T.30-62567879-6 - Ing.B.Ag.Ret.313/80 - Jub.DRP 62567879-6</p>
        </div>


    </div>



    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>Profesional: </b></p>
                         </td>
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-left;">
                            <p>{{$nomb_completo}}</p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>



    @foreach ($pagoItems as $key => $pagoItem)


    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>Fecha: </b></p>
                         </td>

                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p>{{ $pagoItem->pago->fecha }}</p>
                        </td>

                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;padding-left:15px" class="text-left">
                            <p><b>Obra Social: </b></p>
                         </td>

                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p>{{ $pagoItem->pago->obra }}</p>
                        </td>
                        

                    </tr>


      
                </tbody>
            </table>

            
        </div>

    </div>

    <div class="col-md-12" style="font-size: 12px;line-height: 0.0000001;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            
            <table class="table" style="padding: 0px">
        
                <tbody style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
      
                    

                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
              
                        <td style="width: 170px;text-align:center;padding: 0px"> <p>Pago O. Social</p> </td> 
                        <td style="width: 150px;padding: 0px"> <p>{{number_format($pagoItem->pago->subtotal, 2, ',' , '.' )}}</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p>Alícuota Colegio</p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p>{{number_format($pagoItem->pago->iva, 2, ',' , '.' )}}</p> </td> 

                    </tr>


                	@foreach ($pagoItem->pago->descuento as $key => $descuento)


                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
              
                        <td style="width: 170px;text-align:center;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 150px;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p> {{$descuento->nombre}}</p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p>{{number_format($descuento->valor, 2, ',' , '.' )}}</p> </td> 

                    </tr>

                    @endforeach

      
                </tbody>
            </table>
            
        </div>

    </div>

     <div class="col-md-12" style="font-size: 12px;line-height: 0.0000001;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">


        <div class="">

            <table class="table" style="padding: 0px">
        
                <tbody style="padding: 0px">
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
                      
                        <td style="width: 170px;text-align:center;padding: 0px"> <p><b>Pagos / Reintegros</b></p> </td> 
                        <td style="width: 150px;padding: 0px"> <p><b>{{number_format($pagoItem->pago->subtotal, 2, ',' , '.' )}}</b></p> </td> 
                        <td style="width: 170px;padding: 0px"><p><b>Descuentos / Retenciones</b></p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p><b>{{number_format($pagoItem->pago->retencion, 2, ',' , '.' )}}</b></p> </td> 

                    </tr>

                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
                      
                        <td style="width: 170px;text-align:center;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 150px;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p><b>Total Liquidación</b></p> </td> 
                        <td style="width: 150px;text-align:right;border: 1px solid #000;padding: 0px"> <p><b>{{number_format($pagoItem->pago->total, 2, ',' , '.' )}}</b></p> </td> 

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>


    @endforeach






   

                        

    
@endsection