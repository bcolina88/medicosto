<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Model\User;
use App\Model\Permiso;
use App\Model\Role;
use App\Model\Obra;
use App\Model\Profesional;
use App\Model\Liquidacion;



use Carbon\Carbon;
use DateTime;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $photos_path = "documentos";


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */



     public function permissions(Request  $request)
    {
        

        $permissions = Permiso::where('idrol', 1)->with('maestro')->get();
        return $permissions;

       
    }


    public function getRoleInfo(Request  $request)
    {

        $role = Role::where('id', $request->id)->first();
        $permissions = Permiso::where('idrol', $request->id)->with('maestro')->get();

        return ['role' => $role, 'permisos' => $permissions];

    }


    public function getCarga(Request  $request)
    {

        $Profesional = Profesional::all();
        $Liquidacion = Liquidacion::all();
        $Obra = Obra::all();

 
        return ['profesionales' => $Profesional, 'obras' => $Obra, 'liquidaciones' => $Liquidacion];

    }

   
      
      

    
       
}
