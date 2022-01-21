<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Obra;
use App\Model\Profesional;
use App\Model\Liquidacion;
use Session;
use DB;


class LiquidacionController extends Controller
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
        $liquida_imp=""; 


        if ($search =='Corresponde') {
        	 	$liquida_imp=1; 
        }

        if ($search =='No Corresponde') {
        	 	$liquida_imp=0; 
        }



        $liquidaciones =Liquidacion::Where('liquidaciones.fecha','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.federacion_cuota','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.colegio_cuota','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.factura_federacion','LIKE','%'.$search.'%')
        			 // ->orWhere('liquidaciones.factura_colegio','LIKE','%'.$liquida_imp.'%')
                      ->orderBy('liquidaciones.id','DESC')
                      ->select('liquidaciones.*')
                      ->paginate(25);

        return view('liquidaciones.listado', compact('liquidaciones'));


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


        $liquidacion =[];
        $tipo = "guardar";
        return view('liquidaciones.crear',compact('liquidacion','tipo','date'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        date_default_timezone_set("America/Chicago");

        $carbon = new \Carbon\Carbon();
        $date = $carbon->now();
        $date = $date->format('d-m-Y');


       /* if ($request->liquida_imp == 'true') {
        	$liquida_imp = 1;
        }else{
        	$liquida_imp = 0;

        }*/


            $Liquidacion = Liquidacion::firstOrCreate([

             'fecha'                  => $date,
             'federacion_cuota'       => $request->federacion_cuota,
             'colegio_cuota'          => $request->colegio_cuota,
             'factura_colegio'        => $request->factura_colegio,
             'factura_federacion'     => $request->factura_federacion,

            ]);



            $Liquidacion->save();

            session::flash('message','La Retención fue creada correctamente');
            return redirect(route('retenciones.index')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$liquidacion = Liquidacion::find($id);
        return view('liquidaciones.detalle', compact('liquidacion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    	$liquidacion = Liquidacion::find($id);
        $tipo = "editar";

        $date = $liquidacion->fecha;


        return view('liquidaciones.editar', compact('liquidacion','tipo','date'));

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


        /*if ($request->liquida_imp == 'true') {
        	$liquida_imp = 1;
        }else{
        	$liquida_imp = 0;

        }*/


    	$Liquidacion = Liquidacion::find($id);


        $Liquidacion->fill([
       
             'federacion_cuota'       => $request->federacion_cuota,
             'colegio_cuota'          => $request->colegio_cuota,
             'factura_colegio'        => $request->factura_colegio,
             'factura_federacion'     => $request->factura_federacion,
  

        ]);

        $Liquidacion->save();

        session::flash('message','La Retención fue actualizada correctamente');
        return redirect(route('retenciones.index')); 

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Liquidacion::destroy($id);
        session::flash('message','La Retención fue eliminada correctamente');
        return redirect(route('retenciones.index')); 
    }


    

}
