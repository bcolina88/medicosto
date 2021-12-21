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
    }

    .table>thead>tr>th {
        border-bottom: 2px solid #fff;
    }

    .table>tbody>tr>th {
        border-bottom: 2px solid #fff;
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
                            <p><b>Profesional: {{$pago->profesional->id}}</b></p>
                         </td>
                        <td style="border-top: 1px solid #fff;border-bottom: 2px solid #fff;" class="text-left;">
                            <p>{{$pago->profesional->apellido}}, {{$pago->profesional->nombre}}</p>
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

    <div class="col-md-12" style="font-size: 12px;line-height: 0.5;text-align:left;border-top: 1px solid #fff;border-bottom: 2px solid #fff;">


        <div class="">

            
            <table class="table">
        
                <tbody style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
      
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
              
                        <td style="width: 200px;text-align:center"> <p>Pago O. Sociales</p> </td> 
                        <td style="width: 200px"> <p>62.895,14</p> </td> 
                        <td style="width: 50px;">  <p>Ingresos Brutos</p> </td> 
                        <td style="width: 200px;text-align:center"> <p>0,00</p> </td> 

                    </tr>
                    <tr style=" border-top: 1px solid #fff;border-bottom: 2px solid #fff;">
              
                        <td style="width: 200px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <p>000000</p> </td> 
                        <td style="width: 100px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <b>000000</b> </td> 
                        <td style="width: 50px;color:white;border-top: 1px  solid #fff;border-bottom: 2px solid #fff;">  <b>000000</b> </td> 
                        <td style="width: 200px;color:white;border-top: 1px solid #fff;border-bottom: 2px solid #fff;"> <p>000000</p> </td> 

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
                            <p><b>2.- Pagos</b></p>
                         </td>
                        

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>


   

                        

    
@endsection