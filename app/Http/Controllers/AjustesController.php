<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ajustes;
use App\Models\Articulo;
use App\Models\Kardex;
use App\Models\Existencia;
use App\Models\DetalleAjustes;
use Carbon\Carbon;
use DB;
use Auth;

class AjustesController extends Controller
{
	public function index(Request $request){	
		$rol=DB::table('roles')-> select('newajuste','showajuste')->where('iduser','=',$request->user()->id)->first();

		   $query=trim($request->get('searchText'));
			$datos=DB::table('ajustes as ar')
            -> where ('ar.concepto','LIKE','%'.$query.'%')
            -> orderBy('ar.idajuste','desc')
            ->paginate(20);  
		return view('ajuste.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
	public function create(Request $request){
		$rol=DB::table('roles')-> select('newajuste','showajuste')->where('iduser','=',$request->user()->id)->first();	
		if ($rol->newajuste==1){	
			$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
			$articulos =DB::table('articulos as art')
			-> select(DB::raw('CONCAT(art.codigo,"-",art.nombre," - ",art.stock) as articulo'),'art.idarticulo','art.stock','art.precio')
			-> where('art.estado','=','Activo')
			-> get();

			return view("ajuste.create",["rol"=>$rol,"articulos"=>$articulos,"empresa"=>$empresa]);
		} else { 
		return view("reportes.mensajes.noautorizado");
		}
    }
	    public function store(Request $request){
		//dd($request);
		$user=Auth::user()->name;
		//try{
			 $empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
			DB::beginTransaction();
			$ajuste=new Ajustes;
			$ajuste->concepto=$request->get('concepto');
			$ajuste->usuario=$user;
			$ajuste->monto=$request->get('totalo');
			$mytime=Carbon::now('America/Caracas');
			$ajuste->fecha=$mytime->toDateTimeString();	 
			$ajuste-> save();

			$idarticulo = $request -> get('idarticulo');
			$cantidad = $request -> get('cantidad');
			$tipo = $request -> get('tipo');
			$tipomv = $request -> get('tipom');
			$costo = $request -> get('precio_compra');

			$cont = 0;
            while($cont < count($idarticulo)){
				$detalle=new DetalleAjustes();
				$detalle->idajuste=$ajuste->idajuste;
				$detalle->idarticulo=$idarticulo[$cont];
				if($tipo[$cont]==1){$var="Cargo";}else{$var="Descargo";}
				$detalle->tipo_ajuste=$var;
				$detalle->cantidad=$cantidad[$cont];
				$detalle->costo=$costo[$cont];
				$detalle->valorizado=($costo[$cont]*$cantidad[$cont]);
				$detalle->save();  
            
				$articulo=Articulo::findOrFail($idarticulo[$cont]);
				$valida=$tipo[$cont];
				//dd($valida);
				$articulo->precio=$costo[$cont];
				if($valida==1){ $tipom=1;
					$articulo->stock=($articulo->stock+$cantidad[$cont]);
				}else{ $tipom=2;
					$articulo->stock=($articulo->stock-$cantidad[$cont]);
				}
				$articulo->update(); 
				
					$kar=new Kardex;
					$kar->fecha=$mytime->toDateTimeString();
					$kar->documento="AJUS-".$ajuste->idajuste;
					$kar->idarticulo=$idarticulo[$cont];
					$kar->cantidad=$cantidad[$cont];
					$kar->costo=$costo[$cont];
					$kar->tipo=$tipom; 
					$kar->user=$user;
					 $kar->save();   
				
				$mov=DB::table('existencia')->where('idalmacen','=',1)->where('idarticulo','=',$idarticulo[$cont])->first();
				$idmov=$mov->id;
				$compra=Existencia::findOrFail($idmov);
				if($valida=="Cargo"){
				$compra->existencia=($compra->existencia+$cantidad[$cont]); }else{
				$compra->existencia=($compra->existencia-$cantidad[$cont]); }
				$compra->update(); 	
						
					$cont=$cont+1;
					}
				DB::commit();
		//}
		//catch(\Exception $e)
		//{
		//		DB::rollback();
	//	}
	return Redirect::to('ajustes');
	} 	
	public function show($id){
		
		$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		$ajuste=DB::table('ajustes as a')
            -> join ('detalle_ajuste as da','a.idajuste','=','da.idajuste')
            -> select ('a.idajuste','a.fecha as fecha_hora','a.concepto','a.usuario as responsable','a.monto')
            ->where ('a.idajuste','=',$id)
            -> first();

            $detalles=DB::table('detalle_ajuste as da')
            -> join('articulos as a','da.idarticulo','=','a.idarticulo')
            -> select('a.nombre as articulo','da.cantidad','da.tipo_ajuste','da.costo')
            -> where ('da.idajuste','=',$id)
            ->get();

		return view("ajuste.show",["ajuste"=>$ajuste,"detalles"=>$detalles,"empresa"=>$empresa]);
	}
}
