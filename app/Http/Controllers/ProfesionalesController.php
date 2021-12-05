<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Obra;
use App\Model\Profesional;
use Session;
use DB;


class ProfesionalesController extends Controller
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


        $profesionales =Profesional::Where('profesionales.nombre','LIKE','%'.$search.'%')
                      ->orderBy('profesionales.id','DESC')
                      ->select('profesionales.*')
                      ->paginate(25);

        return view('profesionales.listado', compact('profesionales'));


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $profesional =[];
        $tipo = "guardar";
        return view('profesionales.crear',compact('profesional','tipo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->retiene_ganancia == 'on') {
        	$retiene_ganancia = 1;
        }else{
        	$retiene_ganancia = 0;

        }


            $profesional = Profesional::firstOrCreate([
             'nombre'          => $request->nombre,
             'apellido'        => $request->apellido,
             'matricula'       => $request->matricula,
             'calle'          => $request->calle,
             'codigo_postal'          => $request->codigo_postal,
             'datos_complementarios'          => $request->datos_complementarios,
             'fecha_nacimiento'          => $request->fecha_nacimiento,
             'active'          => 1,
             'lugar'          => $request->lugar,
             'telefono'       => $request->telefono,
             'cuit'           => $request->cuit,
             'ingreso_bruto'          => $request->ingreso_bruto,
             'tipo_ingreso_bruto'    => $request->tipo_ingreso_bruto,
             'cond_iva'          => $request->cond_iva,
             'fecha_ingreso_coc'          => $request->fecha_ingreso_coc,
             'banco'          => $request->banco,
             'tipo_cuenta'          => $request->tipo_cuenta,
             'num_cuenta'          => $request->num_cuenta,
             'fecha_desde'          => $request->fecha_desde,
             'fecha_hasta'          => $request->fecha_hasta,
             'comentarios'          => $request->comentarios,
             'retiene_ganancia'          => $retiene_ganancia,
             'numero'          => $request->numero,


            ]);



            $profesional->save();

            session::flash('message','El profesional Fue Creado Correctamente');
            return redirect(route('profesionales.index')); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    	$profesional = Profesional::find($id);
        return view('profesionales.detalle', compact('profesional'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    	$profesional = Profesional::find($id);
        $tipo = "editar";

        return view('profesionales.editar', compact('profesional','tipo'));

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


        if ($request->retiene_ganancia == 'on') {
        	$retiene_ganancia = 1;
        }else{
        	$retiene_ganancia = 0;

        }


    	$profesional = Profesional::find($id);


        $profesional->fill([
            'nombre'          => $request->nombre,
             'apellido'        => $request->apellido,
             'matricula'       => $request->matricula,
             'calle'          => $request->calle,
             'codigo_postal'          => $request->codigo_postal,
             'datos_complementarios'          => $request->datos_complementarios,
             'fecha_nacimiento'          => $request->fecha_nacimiento,
             'lugar'          => $request->lugar,
             'telefono'       => $request->telefono,
             'cuit'           => $request->cuit,
             'ingreso_bruto'          => $request->ingreso_bruto,
             'tipo_ingreso_bruto'    => $request->tipo_ingreso_bruto,
             'cond_iva'          => $request->cond_iva,
             'fecha_ingreso_coc'          => $request->fecha_ingreso_coc,
             'banco'          => $request->banco,
             'tipo_cuenta'          => $request->tipo_cuenta,
             'num_cuenta'          => $request->num_cuenta,
             'fecha_desde'          => $request->fecha_desde,
             'fecha_hasta'          => $request->fecha_hasta,
             'comentarios'          => $request->comentarios,
             'retiene_ganancia'          => $retiene_ganancia,
             'numero'          => $request->numero,
             'active' => $request->estado,
        ]);

        $profesional->save();

        session::flash('message','El profesional Fue Actualizado Correctamente');
        return redirect(route('profesionales.index')); 

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Profesional::destroy($id);
        session::flash('message','El profesional Fue Eliminado Correctamente');
        return redirect(route('profesionales.index')); 
    }


     /**
     * Activa al usuario modificando su estatus
     */
    public function activate($id)
    {
        $profesional = Profesional::where('id', $id)->first();

        $profesional->active = 1;
        $profesional->save();


        return redirect(route('profesionales.index')); 

    }

    /**
     * desactiva al usuario modificando su estatus
     */
    public function deactivate($id)
    {
        $profesional = Profesional::where('id', $id)->first();


        $profesional->active = 0;
        $profesional->save();

        return redirect(route('profesionales.index')); 
    }










}
