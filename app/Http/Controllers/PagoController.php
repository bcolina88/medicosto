<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Obra;
use App\Model\Pago;

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
                    
                    })->Join('profesionales', function($f) use($search)
                    {
                        $f->on('pagos.idprofesional','=','profesionales.id');
   
                    })->orWhere('obras.nombre','LIKE','%'.$search.'%')
                      ->orWhere('profesionales.nombre','LIKE','%'.$search.'%')
                      ->orWhere('profesionales.apellido','LIKE','%'.$search.'%')
                      ->orWhere('profesionales.matricula','LIKE','%'.$search.'%')
                      ->orWhere('pagos.importe','LIKE','%'.$search.'%')
                      ->orWhere('pagos.fecha','LIKE','%'.$search.'%')
                      ->orderBy('pagos.id','DESC')
                      ->select('pagos.*','obras.nombre')
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

            $pago = Pago::firstOrCreate([
             'fecha'          => $date,
             'importe'          => $request->importe,
             'idliquidacion'	=> $request->idliquidacion,
             'idprofesional'  => $request->idprofesional,
             'idobra'	=> $request->idobra,

            ]);



            $pago->save();

            session::flash('message','El pago fue creado correctamente');
            return redirect(route('pagos.index')); 
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


        $pago->fill([
			'importe'          => $request->importe,
			'idliquidacion'	=> $request->idliquidacion,
			'idprofesional'  => $request->idprofesional,
			'idobra'	=> $request->idobra,
                           
        ]);

        $pago->save();

        session::flash('message','El pago fue actualizado correctamente');
        return redirect(route('pagos.index')); 

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
        session::flash('message','El pago fue eliminadc correctamente');
        return redirect(route('pagos.index')); 
    }


     /**
     * Activa al usuario modificando su estatus
     */
    public function activate($id)
    {
        $obras = Obra::where('id', $id)->first();

        $obras->active = 1;
        $obras->save();


        return redirect(route('obras.index')); 

    }

    /**
     * desactiva al usuario modificando su estatus
     */
    public function deactivate($id)
    {
        $Obra = Obra::where('id', $id)->first();


        $Obra->active = 0;
        $Obra->save();

        return redirect(route('obras.index')); 
    }




}
