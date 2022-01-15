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
use App\Model\Pago;
use App\Model\PagoItem;
use App\Model\Descuento;



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

        /*$Profesional = Profesional::all();
        $Liquidacion = Liquidacion::all();
        $Obra = Obra::all();*/

        $Profesional = Profesional::where('active',1)->get();
        $Liquidacion = Liquidacion::all();
        $Obra = Obra::where('active',1)->get();

 
        return ['profesionales' => $Profesional, 'obras' => $Obra, 'liquidaciones' => $Liquidacion];

    }


    public function getDescuento(Request  $request)
    {

        $Liquidacion = Liquidacion::where('id', $request->id)->first();
   
        return $Liquidacion;

    }

     public function getObra(Request  $request)
    {
      $article = Obra::where('id',$request->id)->get();
      $retencion = Liquidacion::where('id', $request->retencion)->first();
      $article[0]['retencion']= $retencion;

      return json_encode($article);

    }  

    public function getPagosItems(Request  $request)
    {
      $pago = Pago::where('id',$request->id)->first();
      $albaranesItems = PagoItem::where('idpago',$request->id)->get();
      $descuentos = Descuento::where('idpago',$request->id)->get();
      $liquidacion = Liquidacion::where('id',$pago->idliquidacion)->first();
      $articulos =[];

      foreach ($albaranesItems as $key => $items) {

          $article = Obra::where('id',$items['idobra'])->first();

          $articulo = array('idarticulo' => $items['idobra'],'nombre' => $article->nombre,'importe' => $pago->porcentaje_cobro,'cantidad' => $items['total_fact_odont'],'id' => $article->id,
            'total' => $items['total'],  'total_general' => $pago->total,'sub_total' => $pago->subtotal,'iva' => $pago->iva, 'precio' => $items['porcentaje_cobro'], 'retencion' =>$liquidacion);  
          
          array_push($articulos,$articulo);


         
      }

      //return json_encode($articulos);

      return ['obras' => $articulos, 'descuentos'=>$descuentos];

    }


   
      
      

    
       
}
