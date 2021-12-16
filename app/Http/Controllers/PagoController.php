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
                    
                    })->Join('profesionales', function($f) use($search)
                    {
                        $f->on('pagos.idprofesional','=','profesionales.id');
   
                    })->orWhere('profesionales.nombre','LIKE','%'.$search.'%')
                      ->orWhere('profesionales.apellido','LIKE','%'.$search.'%')
                      ->orWhere('profesionales.matricula','LIKE','%'.$search.'%')
                      ->orWhere('pagos.importe','LIKE','%'.$search.'%')
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
	           
	                 'fecha'            => $date,
		             'importe'          => $request->importe,
		             'idliquidacion'	=> $request->idliquidacion,
		             'idprofesional'    => $request->idprofesional,
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
		             'fecha'            => $date,
		             'importe'          => $request->importe,
		             'idliquidacion'	=> $request->idliquidacion,
		             'idprofesional'    => $request->idprofesional,
		             'iva'              => $request->iva,  
		             'descuento'        => $request->descuento,
		             'subtotal'         => $request->subtotal, 
		             'total'            => $request->total, 
		        
		        ]);


		        $pago->save();


		}



		        $articulos = $request->obras;


		        foreach ($articulos as $key => $item) {
		           
			          //$article = Obra::where('id',$item['id'])->first();


			          $pago_items = PagoItem::firstOrCreate([
			             'idpago'         => $pago->id,
			             'idobra'         => $item['id'],
			             'total_fact_odont'       => $item['cantidad'], 
			             'porcentaje_cobro'  => $item['precio'],
			             'total'          => $item['total'],
			             'fecha'          => $date,
			        
			          ]);
		          
		        }



		        $descuentos = $request->descuentos;


		        foreach ($descuentos as $key => $item) {
		           
			          //$article = Obra::where('id',$item['id'])->first();


			          $descuento = Descuento::firstOrCreate([
			             'idpago'            => $pago->id,
			             'idprofesional'     => $request->idprofesional,
			             'nombre'            => $item['nombre'], 
			             'valor'             => $item['importe'],
			             'total_descuento'   => $request->descuento,
			             'fecha'             => $date,
			        
			          ]);
		          
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


    	$pago = Pago::find($id);
    	$v =[];
        $v=$request->obras;
        $photo ='';


        for ($i = 0; $i < count($v); $i++) {
        	$photo = $v[$i].','.$photo;
        }

        $obras = rtrim($photo,',');



        $pago->fill([
			'importe'          => $request->importe,
			'idliquidacion'	=> $request->idliquidacion,
			'idprofesional'  => $request->idprofesional,
			'obras'	=> $obras,
                           
        ]);

        $pago->save();

        session::flash('message','La liquidación fue actualizada correctamente');
        return redirect(route('liquidaciones.index')); 

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
        $pago =  Pago::with(['liquidacion', 'profesional'])->where('id',$id)->first();


        $pdf = PDF::loadView('pdf.recibo', compact('pago'));


        $nomb = $pago->profesional->apellido;

        return $pdf->download($nomb.'.pdf');
    }





}
