<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Deposito;
use App\Models\Entrega;
use App\Models\DetalleEntrega;
use App\Models\Clientes;
use App\Models\Kardex;
use App\Models\Existencia;
use App\Models\Articulo;
use App\Models\Controltobos;
use Carbon\Carbon;
use DB;
use Auth;

class EntregaController extends Controller
{
 	   public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request){
$id=Auth::user()->id;	
		$rol=DB::table('roles')-> select('ventas','newventa','anularventa','showventa')->where('iduser','=',$id)->first();
		   $query=trim($request->get('searchText'));
			$datos=DB::table('entrega as e')
			->join('clientes as cl','cl.idcliente','=','e.idcliente')
            -> where ('cl.nombre','LIKE','%'.$query.'%')
            -> orderBy('e.identrega','desc')
            ->paginate(30);  
			if ($rol->ventas==1){	
		return view('entrega.index',["rol"=>$rol,"datos"=>$datos,"query"=>$query]);
			} else { 
		return view("reportes.mensajes.noautorizado");
		}
	}
	public function create(){
		$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
		$clientes=	Clientes::all();
		$contador=DB::table('entrega')->select('identrega')->limit('1')->orderby('identrega','desc')->first();
			$articulos =DB::table('articulos as art')
			->join('existencia as ex','ex.idarticulo','=','art.idarticulo')
			->join('deposito as dep','dep.iddeposito','=','ex.idalmacen')
			-> select(DB::raw('CONCAT(art.codigo,"-",art.nombre," - ",ex.existencia) as articulo'),'art.idarticulo','art.stock','art.precio')
			-> where('art.estado','=','Activo')
			-> where ('ex.existencia','>','0')
			-> where ('ex.idalmacen','=',1)
			-> where ('art.venta','=',1)
			-> get();
			//dd($articulos);
			  if ($contador==""){$contador=0;}
			  //dd($contador);
		return view('entrega.create',["empresa"=>$empresa,"articulos"=>$articulos,"clientes"=>$clientes,"contador"=>$contador]);
	}
		public function store (Request $request)
    {		
	$user=Auth::user()->name;
	$id=Auth::user()->id;
 //dd($request);

        $data=new Entrega;
        $data->idcliente = $request->get('cliente');
        $data->idusuario = $id;
        $data->tipo = "FAC";
        $data->totalventa = $request->get('totalo');
		$mytime=Carbon::now('America/Caracas');
		$data->fecha=$mytime->toDateTimeString();
		$data->usuario = $user;
        $data->save();
		
			$idarticulo = $request -> get('idarticulo');
			$cantidad = $request -> get('cantidad');
			$costo = $request -> get('precio_compra');

			$cont = 0;
            while($cont < count($idarticulo)){
				$detalle=new DetalleEntrega();
				$detalle->identrega=$data->identrega;
				$detalle->idarticulo=$idarticulo[$cont];
				$detalle->cantidad=$cantidad[$cont];
				$detalle->precio=$costo[$cont];
				$detalle->valor=($costo[$cont]*$cantidad[$cont]);
				$detalle->fecha=$mytime->toDateTimeString();
				$detalle->save();  
            if($idarticulo[$cont]==2){
					$mov=new controltobos;
					$mov->idcliente=$request->get('cliente');
					$mov->tipo=0;
					$mov->deposito=1;
					$mov->cantidad=$cantidad[$cont];
					$mov->observacion="Venta ".$data->identrega;;
					$mytime=Carbon::now('America/Caracas');
					$mov->fecha=$mytime->toDateTimeString();
					$mov->usuario=$user;
					$mov->save();
				$cliente=Clientes::findOrFail($request->get('cliente'));
				$cliente->tobos=$cliente->tobos+$cantidad[$cont];
				$cliente->update(); 

			}
				$articulo=Articulo::findOrFail($idarticulo[$cont]);
				$articulo->precio=$costo[$cont];
				$tipom=2;
				$articulo->stock=($articulo->stock-$cantidad[$cont]);
				$articulo->update(); 
				
					$kar=new Kardex;
					$kar->fecha=$mytime->toDateTimeString();
					$kar->documento="FAC-".$data->identrega;
					$kar->idarticulo=$idarticulo[$cont];
					$kar->cantidad=$cantidad[$cont];
					$kar->costo=$costo[$cont];
					$kar->tipo=$tipom; 
					$kar->user=$user;
					 $kar->save();   
				
				$mov=DB::table('existencia')->where('idalmacen','=',1)->where('idarticulo','=',$idarticulo[$cont])->first();
				$idmov=$mov->id;
				$compra=Existencia::findOrFail($idmov);
				$compra->existencia=($compra->existencia-$cantidad[$cont]);
				$compra->update(); 	
						
					$cont=$cont+1;
					}


					
       return Redirect::to('entrega');

    }
		public function show($id){
			$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
		$data=DB::table('entrega as en')
		-> join ('clientes as cli','cli.idcliente','=','en.idcliente')
		->where ('en.identrega','=',$id)
		-> first();
			$detalle=DB::table('detalle_entrega as re')
		-> join ('articulos as a','a.idarticulo','=','re.idarticulo')
		->select('re.*','a.nombre','a.codigo')
		->where ('re.identrega','=',$id)
		->groupby('re.iddetalle')
		-> get();

		//	dd($detalle);
		return view("entrega.show",["empresa"=>$empresa,"data"=>$data,"detalle"=>$detalle]);
	}
		public function anular(Request $request){
		$user=Auth::user()->name;
		//dd($request);
		$d=Entrega::findOrFail($request->recoleccion);
        $d->status=1;
        $d->update();
			$contr=0;

		$arti=DB::table('detalle_entrega')-> where('identrega','=',$request->recoleccion)->get();
		$ld = count($arti);
			if($ld>0){
				$array = array();
					foreach($arti as $t){
					$arrayid[] = $t->idarticulo;
					$arraycnt[] = $t->cantidad;
					$arrayp[] = $t->precio;
					}
		    	for ($k=0;$k<$ld;$k++){	
				
					$kar=new Kardex;
					$mytime=Carbon::now('America/Caracas');
					$kar->fecha=$mytime->toDateTimeString();
					$kar->documento="DEV-".$request->recoleccion;
					$kar->idarticulo=$arrayid[$contr];
					$kar->cantidad=$arraycnt[$contr];
					$kar->costo=$arrayp[$contr];
					$kar->tipo=1; 
					$kar->user=$user;
					$kar->save();
					
				$articulo=Articulo::findOrFail($arrayid[$contr]);
				$articulo->stock=($articulo->stock+$arraycnt[$contr]);
				$articulo->update(); 
				
				$mov=DB::table('existencia')->where('idalmacen','=',3)->where('idarticulo','=',$arrayid[$contr])->first();
				$idmov=$mov->id;
				$compra=Existencia::findOrFail($idmov);
				$compra->existencia=($compra->existencia+$arraycnt[$contr]);
				$compra->update(); 	
				
				$contr=$contr+1;
				}  			
			} 
			//dd($depodos);
	  return Redirect::to('entrega');
	}
	 public function almacena(Request $request)
    {	
	//dd($request);
     if($request->ajax()){
		 $paciente=new Clientes;
        $paciente->nombre=$request->get('cnombre');
        $paciente->cedula=$request->get('ccedula');
        $paciente->telefono=$request->get('ctelefono');
        $paciente->direccion=$request->get('cdireccion');;
		 $mytime=Carbon::now('America/Caracas');
		$paciente->creado=$mytime->toDateTimeString();
        $paciente->save();
	// dd($paciente);
	$personas=DB::table('clientes')->select('clientes.idcliente','clientes.nombre')-> where('clientes.cedula','=',$request->get('ccedula'))->get();
           return response()->json($personas);
	}
    }
}
