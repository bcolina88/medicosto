<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Obra;
use App\Model\Pago;
use App\Model\PagoItem;
use App\Model\Descuento;


use Barryvdh\DomPDF\Facade as PDF;

use Session;
use DB;


class PagoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $search = $request->get('search');


        $pagos = Pago::Join('liquidaciones', function($f) use($search)
                    {
                        $f->on('pagos.idliquidacion','=','liquidaciones.id');
                    
                    })->Join('obras', function($f) use($search)
                    {
                        $f->on('pagos.idobra','=','obras.id');
   
                    })->orWhere('obras.nombre','LIKE','%'.$search.'%')
                      ->orWhere('pagos.fecha','LIKE','%'.$search.'%')
                      ->orderBy('pagos.id','DESC')
                      ->select('pagos.*')
                      ->paginate(25);

        return view('pagos.listado', compact('pagos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        date_default_timezone_set("America/Chicago");

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('d-m-Y');
        $pago =[];
        $tipo = "guardar";


        return view('pagos.crear', compact('pago','date','tipo'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('d-m-Y');


        $arti = [];
        $canti = [];
  
        $eliminar = [];

        /*$v =[];
        $v=$request->obras;
        $photo ='';


        for ($i = 0; $i < count($v); $i++) {
        	$photo = $v[$i].','.$photo;
        }

        $obras = rtrim($photo,',');*/


        if ($request->tipo==="editar") {


        	$albaranesItem = PagoItem::where('idpago',$request->id)->get();
        	$descuentoItem = Descuento::where('idpago',$request->id)->get();
            $pago = Pago::find($request->id);
          
	        $pago->fill([
	           
	                 'fecha'            => $request->fecha,
		             'idliquidacion'	=> $request->idliquidacion,
		             'idobra'           => $request->idobra,
		             'iva'              => $request->iva,  
		             'descuento'        => $request->descuento,
		             'subtotal'         => $request->subtotal, 
		             'total'            => $request->total, 
	        ]);

	        $pago->save();

	        foreach ($albaranesItem as $key => $item) {

	    
	            PagoItem::destroy($item['id']);  
	          
	        }

	        foreach ($descuentoItem as $key => $item) {

	    
	            Descuento::destroy($item['id']);  
	          
	        }

	    /************************************************************************/


        }


        if ($request->tipo==="guardar") {

       

		        $pago = Pago::firstOrCreate([
		             'fecha'            => $request->fecha,
		             'idliquidacion'	=> $request->idliquidacion,
		             'idobra'           => $request->idobra,
		             'iva'              => $request->iva,  
		             'descuento'        => $request->descuento,
		             'subtotal'         => $request->subtotal, 
		             'total'            => $request->total, 
		        
		        ]);


		        $pago->save();


		}



		        $articulos = $request->profesionales;


		        foreach ($articulos as $key => $item) {
		           
			          //$article = Obra::where('id',$item['id'])->first();


			          $pago_items = PagoItem::firstOrCreate([
			             'idpago'         => $pago->id,
			             'idprofesional'       => $item['id'],
			             'total_fact_odont'       => $item['cantidad'], 
			             'porcentaje_cobro'  => $item['precio'],
			             'total'          => $item['total'],
			             'fecha'          => $date,
			        
			          ]);

			          $pago_items->save();
		          
		        }



		        $descuentos = $request->descuentos;


		        foreach ($descuentos as $key => $item) {
		           
			          //$article = Obra::where('id',$item['id'])->first();


			          $descuento = Descuento::firstOrCreate([
			             'idpago'            => $pago->id,
			             'idobra'            => $pago->idobra,
			             'nombre'            => $item['nombre'], 
			             'valor'             => $item['importe'],
			             'total_descuento'   => $request->descuento,
			             'fecha'             => $date,
			        
			          ]);

			          $descuento->save();
		          
		        }






		        return json_encode('creado');




    }


   

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    	
    	$pago = Pago::find($id);
        $tipo = "editar";
        $date = $pago->fecha;

        return view('pagos.editar', compact('pago','tipo','date'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	

        $Descuento = Descuento::where('idpago',$id)->get();

        foreach ($Descuento as $key => $item) {
            Descuento::destroy($item['id']);  
        }



        $PagoItem = PagoItem::where('idpago',$id)->get();
        foreach ($PagoItem as $key => $item) {
            PagoItem::destroy($item['id']);  
        }
           


    	Pago::destroy($id);
        session::flash('message','La liquidación fue eliminada correctamente');
        return redirect(route('liquidaciones.index')); 
    }



    public function pdf($id)
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
       /* $historical =  Historical::with(['empleado', 'transcriptor'])->where('id',$id)->first();

        $timesheet = HistoricalHasTimesheet::with(['timesheet'])->where('idhistorical',$historical->id)->first();

        if ($timesheet) {
            $historical['timesheet_info'] = $timesheet;
        }else{
            $historical['timesheet_info'] ='';
        }

        $seguro_social = explode("-", $historical->empleado->seguro_social);
        $ssn = $seguro_social[2];



        $ytd = DB::table('historicals')->where("historicals.idempleado", $id)
                  ->select(DB::raw("sum(historicals.monto) AS total"))
                  ->get();*/

      



       // $pdf = PDF::loadView('pdf.recibo', compact('historical','ssn','ytd'));
        $pago =  Pago::with(['liquidacion', 'obra'])->where('id',$id)->first();

        $pagoItems =  PagoItem::with(['profesional'])->where('idpago',$id)->get();
        $descuentos =  Descuento::with(['obra'])->where('idpago',$id)->get();



        $d =$pago->iva + $pago->descuento;


        $pdf = PDF::loadView('pdf.recibo', compact(['pago','pagoItems','descuentos','d']));



        $nomb = $pago->obra->nombre;

        return $pdf->download($nomb.'.pdf');
    }





}
