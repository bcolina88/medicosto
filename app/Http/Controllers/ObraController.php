<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Obra;
use Session;
use DB;


class ObraController extends Controller
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


        $obras = 	Obra::Where('obras.nombre','LIKE','%'.$search.'%')
                      ->orderBy('obras.id','DESC')
                      ->select('obras.*')
                      ->paginate(25);

        return view('obras.listado', compact('obras'));


    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obra =[];
        $tipo = "guardar";
        return view('obras.crear',compact('obra','tipo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $Obra = Obra::firstOrCreate([
             'nombre'          => $request->nombre,
             'active'          => 1,

            ]);



            $Obra->save();

            session::flash('message','La obra Fue Creada Correctamente');
            return redirect(route('obras.index')); 

    }




    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    	$obra = Obra::find($id);
        $tipo = "editar";

        return view('obras.editar', compact('obra','tipo'));

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


    	$obra = Obra::find($id);


        $obra->fill([
            'nombre'          => $request->nombre,
		    'active'          => $request->active,
		]);

        $obra->save();

        session::flash('message','La obra Fue Actualizada Correctamente');
        return redirect(route('obras.index')); 

   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	Obra::destroy($id);
        session::flash('message','La obra Fue Eliminada Correctamente');
        return redirect(route('obras.index')); 
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
