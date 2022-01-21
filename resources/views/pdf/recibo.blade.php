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

    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:right;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="width: 300px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">00000</td> 
                        <td style="width: 80px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">00000</td>
                        <td style="width: 180px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:right;" class="text-left">
                            <p><b>Fecha de Liquidación: </b></p>
                         </td>
                        <td style="width: 150px;border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-right;">
                            <p><b>{{$pago->fecha}}</b></p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>


    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>Obra Social: {{$pago->obra->id}}</b></p>
                         </td>
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-left;">
                            <p>{{$pago->obra->nombre}}</p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>

    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>1.- Liquidación</b></p>
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
                        <td style="width: 150px;padding: 0px"> <p>{{number_format($pago->subtotal, 2, ',' , '.' )}}</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p>Alícuota Colegio</p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p>{{number_format($pago->iva, 2, ',' , '.' )}}</p> </td> 

                    </tr>


                	@foreach ($descuentos as $key => $descuento)


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
                        <td style="width: 150px;padding: 0px"> <p><b>{{number_format($pago->subtotal, 2, ',' , '.' )}}</b></p> </td> 
                        <td style="width: 170px;padding: 0px"><p><b>Descuentos / Retenciones</b></p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p><b>{{number_format($d, 2, ',' , '.' )}}</b></p> </td> 

                    </tr>

                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
                      
                        <td style="width: 170px;text-align:center;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 150px;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p><b>Total Liquidación</b></p> </td> 
                        <td style="width: 150px;text-align:right;border: 1px solid #000;padding: 0px"> <p><b>{{number_format($pago->total, 2, ',' , '.' )}}</b></p> </td> 

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>



    <div class="col-md-12" style="font-size: 12px;line-height: 0.0000001;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            <table class="table">
        
                <tbody>
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;text-align:left;" class="text-left">
                            <p><b>2.- Pagos</b></p>
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


                   @foreach ($pagoItems as $key => $pagoItem)
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;padding: 0px">
              
                        <td style="width: 30px;padding: 0px;color:white;"> <p>62.895,14</p> </td> 
                        <td style="width: 170px;text-align:left;padding-left: 0px"> <p>{{$pagoItem->profesional->nombre}}</p> </td> 
                        <td style="width: 120px;padding: 0px;color:white;"> <p>62.895,14</p> </td> 
                        <td style="width: 170px;padding: 0px;color:white;">  <p>Alícuota Colegio</p> </td> 
                        <td style="width: 130px;text-align:right;padding: 0px"> <p>{{number_format($pagoItem->total, 2, ',' , '.' )}}</p> </td> 

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
                      
                        <td style="width: 170px;text-align:center;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 150px;color:white;padding: 0px"> <p>000000</p> </td> 
                        <td style="width: 170px;padding: 0px">  <p><b>Total Pagos</b></p> </td> 
                        <td style="width: 150px;text-align:right;padding: 0px"> <p><b>{{number_format($pago->subtotal, 2, ',' , '.' )}}</b></p></td> 

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>



   

                        

    
@endsection