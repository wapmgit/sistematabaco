<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Traslado;
use App\Models\Relacion;
use App\Models\Deposito;
use App\Models\Existencia;
use App\Models\detalleTraslado;
use App\Models\Tanques;
use Carbon\Carbon;
use DB;
use Auth;

class TrasladoController extends Controller
{
    //
	 	public function index(Request $request){
			
			$rol=DB::table('roles')-> select('newtraslado','showtraslado')->where('iduser','=',$request->user()->id)->first();
			$query=trim($request->get('searchText'));
			$datos=DB::table('traslados as de')
			->join('deposito as depo','depo.iddeposito','=','de.origen')
			->join('deposito as depd','depd.iddeposito','=','de.destino')
			->select('de.idtraslado','de.concepto','de.fecha','depo.nombre as deporigen','depd.nombre as depdestino','de.usuario')
			-> where ('de.concepto','LIKE','%'.$query.'%')
            -> orderBy('de.idtraslado','desc')
            ->paginate(30);			
		return view('traslado.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
		}
	public function create(Request $request)
	{
		$rol=DB::table('roles')-> select('deposito')->where('iduser','=',$request->user()->id)->first();
		$deposito=Deposito::all();
		$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		
		$articulos =DB::table('articulos as art')
        -> select(DB::raw('CONCAT(art.codigo," - ",art.nombre," - ",stock) as articulo'),'art.idarticulo','art.stock','art.precio as costo')
        -> where('art.estado','=','Activo')
        -> get();
			return view('traslado.create')
			->with('articulos',$articulos)
			->with('deposito',$deposito)
			->with('rol',$rol)
			->with('empresa',$empresa);
		}
	public function store (Request $request)
    {	 
	//dd($request);
	//try{
   // DB::beginTransaction();
		$user=Auth::user()->name;
        $categoria=new Traslado;
        $categoria->origen=$request->get('origen');
        $categoria->destino=$request->get('destino');
        $categoria->concepto=$request->get('concepto');
        $categoria->responsable=$request->get('responsable');
        $mytime=Carbon::now('America/Caracas');
		$categoria->fecha=$mytime->toDateTimeString();
        $categoria->usuario=$user;
        $categoria->save();

		 $idarticulo = $request -> get('idarticulo');
        $cantidad = $request -> get('cantidad');
        $costo = $request -> get('precio_compra');
		//	
		    $cont = 0;
            while($cont < count($idarticulo)){
            $detalle=new DetalleTraslado();
            $detalle->idtraslado=$categoria->idtraslado;
            $detalle->idarticulo=$idarticulo[$cont];
            $detalle->cantidad=$cantidad[$cont];
            $detalle->precio=$costo[$cont];
            $detalle->save(); 
			
			$mov=DB::table('existencia')->where('idalmacen','=',$request->get('destino'))->where('idarticulo','=',$idarticulo[$cont])->first();
			if($mov==NULL){
				  $exis=new Existencia();
				  $exis->idalmacen=$request->get('destino');
				  $exis->idarticulo=$idarticulo[$cont];
				  $exis->existencia=$cantidad[$cont];
				  $exis->save(); 
				  $movd=DB::table('existencia')->where('idalmacen','=',$request->get('origen'))->where('idarticulo','=',$idarticulo[$cont])->first();
			    $idmovd=$movd->id;
				$venta=Existencia::findOrFail($idmovd);
				$venta->existencia=($venta->existencia-$cantidad[$cont]);
				$venta->update(); 	
			}else{	
				$idmov=$mov->id;
				$compra=Existencia::findOrFail($idmov);
				$compra->existencia=($compra->existencia+$cantidad[$cont]);
				$compra->update(); 	
			  $movd=DB::table('existencia')->where('idalmacen','=',$request->get('origen'))->where('idarticulo','=',$idarticulo[$cont])->first();
			    $idmovd=$movd->id;
				$venta=Existencia::findOrFail($idmovd);
				$venta->existencia=($venta->existencia-$cantidad[$cont]);
				$venta->update(); }
		    $cont=$cont+1;	
			}			
		/*	}
			DB::commit();
}
catch(\Exception $e)
{
    DB::rollback();
}*/
 return Redirect::to('traslado');
    }		
	public function show($id){
		$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
			$datos=DB::table('traslados as de')
			->join('deposito as depo','depo.iddeposito','=','de.origen')
			->join('deposito as depd','depd.iddeposito','=','de.destino')
			->select('de.fecha','de.usuario','de.idtraslado','de.concepto','de.fecha','depo.nombre as deporigen','depd.nombre as depdestino')
			-> where ('de.idtraslado','=',$id)
            ->first();
		$detalles=DB::table('detalle_traslado as dt')
		->join('articulos as ar','ar.idarticulo','=','dt.idarticulo')
		->select('ar.nombre','ar.codigo','dt.cantidad','dt.precio')
		->where('dt.idtraslado','=',$id)
		->get();
		
	
		return view("traslado.show",["empresa"=>$empresa,"datos"=>$datos,"detalles"=>$detalles]);
	}
	public function filtrainventario (Request $request){
		
           if($request->ajax()){
				$articulos=DB::table('articulos')->join('existencia as ex','ex.idarticulo','=','articulos.idarticulo')->where('ex.existencia','>',0)
				->where('ex.idalmacen','=',$request->get('origen'))
				->select(DB::raw('CONCAT(articulos.codigo," - ",articulos.nombre," - ",ex.existencia) as articulo'),'articulos.idarticulo','ex.existencia as stock','articulos.precio as costo')
				-> get(); 
         return response()->json($articulos);
     }     
     }
}
