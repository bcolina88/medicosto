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



        $liquidaciones =Liquidacion::orWhere('liquidaciones.fecha','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.federacion_cuota','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.colegio_cuota','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.colegio_alicuota','LIKE','%'.$search.'%')
        			  ->orWhere('liquidaciones.liquida_imp','LIKE','%'.$liquida_imp.'%')
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


        if ($request->liquida_imp == 'true') {
        	$liquida_imp = 1;
        }else{
        	$liquida_imp = 0;

        }


            $Liquidacion = Liquidacion::firstOrCreate([

             'fecha'          => $date,
             'federacion_cuota'          => $request->federacion_cuota,
             'colegio_cuota'          => $request->colegio_cuota,
             'colegio_alicuota'          => $request->colegio_alicuota,
             'liquida_imp'          => $liquida_imp,

             'liquida_imp_gana'     => $request->liquida_imp_gana, 
             'compra_materiales'     => $request->compra_materiales, 
             'seguro_adicional'     => $request->seguro_adicional, 
             'gastos_admin'     => $request->gastos_admin, 
             'aporte_caja'     => $request->aporte_caja,
  




            ]);



            $Liquidacion->save();

            session::flash('message','La liquidación fue creada correctamente');
            return redirect(route('liquidaciones.index')); 

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


         if ($request->liquida_imp == 'true') {
        	$liquida_imp = 1;
        }else{
        	$liquida_imp = 0;

        }


    	$Liquidacion = Liquidacion::find($id);


        $Liquidacion->fill([
       
             'federacion_cuota'          => $request->federacion_cuota,
             'colegio_cuota'          => $request->colegio_cuota,
             'colegio_alicuota'          => $request->colegio_alicuota,
             'liquida_imp'          => $liquida_imp,
             
             'liquida_imp_gana'     => $request->liquida_imp_gana, 
             'compra_materiales'     => $request->compra_materiales, 
             'seguro_adicional'     => $request->seguro_adicional, 
             'gastos_admin'     => $request->gastos_admin, 
             'aporte_caja'     => $request->aporte_caja,
  

        ]);

        $Liquidacion->save();

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
    	Liquidacion::destroy($id);
        session::flash('message','La liquidacion fue eliminada correctamente');
        return redirect(route('liquidaciones.index')); 
    }


    

}
