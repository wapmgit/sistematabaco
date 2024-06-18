<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Rutas;
use App\Models\Recolectores;
use App\Models\Relacion;
use App\Models\Deposito;
use App\Models\Productores;
use App\Models\Laboratorio;
use App\Models\Recoleccion;
use App\Models\Tanques;
use App\Models\DetalleRecoleccion;
use Carbon\Carbon;
use DB;
use Auth;

class RecepcionController extends Controller
{
	   public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request){
			$rol=DB::table('roles')-> select('newrecepcion','anularrecepcion','resultadoslab')->where('iduser','=',$request->user()->id)->first();
			
			$dep = Deposito::all();
			$tan = Tanques::all();
		   $query=trim($request->get('searchText'));
			$datos=DB::table('recoleccion as re')
            -> join ('rutas as ru','ru.idruta','=','re.idruta')
            -> join ('recolectores as rc','rc.idrecolector','=','re.idrecolector')
            -> select ('re.idrecoleccion','re.estatus','re.anulada','re.fecha','re.observacion','re.litros','ru.nombre as ruta','rc.nombre as recolector')
            -> where ('ru.nombre','LIKE','%'.$query.'%')
            -> orderBy('re.idrecoleccion','desc')
            ->paginate(50);  
		return view('recepcion.index',["rol"=>$rol,"datos"=>$datos,"dep"=>$dep,"tanq"=>$tan]);
	}
	public function create(){
		$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
		$rutas = Rutas::all();
		$productores = Productores::all();
		$recolectores = Recolectores::all();
		return view('recepcion.create',["empresa"=>$empresa,"rutas"=>$rutas,"productores"=>$productores,"recolectores"=>$recolectores]);
	}
	public function store (Request $request)
    {		
	$user=Auth::user()->name;
	//dd($request);
		     $this->validate($request,[
            'ruta' => 'required'
        ]);
        $data=new Recoleccion;
        $data->idruta = $request->get('ruta');
        $data->idrecolector = $request->get('recolector');
        $data->litros = $request->get('litro');
        $data->litrostarima = 0;
        $data->plb =($request->get('plb')*100)/$request->get('litro');
        $data->observacion = $request->get('observacion');
		$mytime=Carbon::now('America/Caracas');
		$data->fecha=$mytime->toDateTimeString();
		$data->usuario = $user;
        $data->save();
		
			$productor = $request -> get('pproductor');
			$cantb = $request -> get('pcantb');
			$cantv = $request -> get('pcantv');
			//$tipo = $request -> get('total_litros');

			$cont = 0;
            while($cont < count($productor)){
				$detalle=new DetalleRecoleccion();
				$detalle->idrecoleccion=$data->idrecoleccion;
				$detalle->idproductor=$productor[$cont];
				$detalle->litrosbufala=$cantb[$cont];
				$detalle->litrosvaca=$cantv[$cont];
				$detalle->fecha=$data->fecha;
				$detalle->save();  
				$cont=$cont+1;
					}
       return Redirect::to('recepcion');

    }
	public function show($id){
		$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
		$data=DB::table('recoleccion as re')
		-> join ('rutas as ru','ru.idruta','=','re.idruta')
		-> join ('recolectores as rc','rc.idrecolector','=','re.idrecolector')
		-> select ('re.idrecoleccion','re.fecha','re.observacion','re.anulada','re.litros','re.litrostarima','ru.nombre as ruta','rc.nombre as recolector')
		->where ('re.idrecoleccion','=',$id)
		-> first();
            $detalles=DB::table('detalle_recoleccion as da')
            -> join('productores as a','a.idproductor','=','da.idproductor')
            -> where ('da.idrecoleccion','=',$id)
            ->get();
			$lab=DB::table('laboratorio as la')
            -> join('recoleccion as re','re.idrecoleccion','=','la.idrecoleccion')
            -> where ('la.idrecoleccion','=',$id)
            ->first();
			//dd($lab);
			if($lab==NULL){ $depouno=NULL; $depodos=NULL; }else{
			$depouno=DB::table('tanques as ta')
            -> join('deposito as dep','dep.iddeposito','=','ta.iddeposito')
			->select('dep.descripcion as deposito','ta.nombre as tanque')
            -> where ('ta.idtanque','=',$lab->tnq)
            ->first();
			$depodos=DB::table('tanques as ta')
            -> join('deposito as dep','dep.iddeposito','=','ta.iddeposito')
			->select('dep.descripcion as deposito','ta.nombre as tanque')
            -> where ('ta.idtanque','=',$lab->tnq2)
            ->first();
			}
			//dd($depodos);
		return view("recepcion.show",["empresa"=>$empresa,"depouno"=>$depouno,"depodos"=>$depodos,"data"=>$data,"detalles"=>$detalles,"lab"=>$lab]);
	}
	public function listarecolector (Request $request){
        if($request->ajax()){
			$recolectores=DB::table('recolectores')
			-> where('recolectores.idruta','=',$request->get('ruta'))->get();
		//$recolectores = Recolectores::all();
         //dd($recolectores);
		 return response()->json($recolectores);
		}
      
     }
	 public function listarproductor (Request $request){
		// dd($request);
        if($request->ajax()){
		$productores=DB::table('productores')
		-> where('productores.idruta','=',$request->get('ruta'))
		->get();
		 return response()->json($productores);
		}    
     }
	 public function filtrotanque (Request $request){
		// dd($request);
        if($request->ajax()){
		$tanques=DB::table('tanques')
		-> where('iddeposito','=', $request->get('dep1'))
		->select('idtanque','nombre','capacidad','uso')
		->get();
		 return response()->json($tanques);
		}    
     }
	 	 public function filtrotanque2 (Request $request){
		//dd($request);
        if($request->ajax()){
		$tanques=DB::table('tanques')
		-> where('iddeposito','=', $request->get('dep2'))
		->select('idtanque','nombre','capacidad','uso')
		->get();
		 return response()->json($tanques);
		}    
     }
	public function lab (Request $request)
    {		
	//dd($request);
        $data=new Laboratorio;
        $data->idrecoleccion = $request->get('idrecoleccion');
        $data->ltst1 = $request->get('ltst1');
        $data->alco = $request->get('al');
        $data->pero = $request->get('pr');
        $data->acdz = $request->get('acdz');
        $data->suer = $request->get('sr');
        $data->rexa = $request->get('rexa');
        $data->gra = $request->get('gra');
        $data->saca = $request->get('sc');
        $data->temp = $request->get('temp');
        $data->dep = $request->get('dep1');
        $data->tnq = $request->get('tan1');
        $data->ltst2 = $request->get('ltst2');
        $data->alco2 = $request->get('al2');
        $data->pero2 = $request->get('pr2');
        $data->acdz2 = $request->get('acdz2');
        $data->suer2 = $request->get('sr2');
        $data->rexa2 = $request->get('rexa2');
        $data->gra2 = $request->get('gra2');
        $data->saca2 = $request->get('sc2');
		$data->temp2 = $request->get('temp2');
        $data->dep2 = $request->get('dep2');
        $data->tnq2 = $request->get('tan2');		
		$mytime=Carbon::now('America/Caracas');
		$data->fecha=$request->get('fecha');
        $data->save();
		
		$d=Recoleccion::findOrFail($request->idrecoleccion);
        $d->estatus=1;
        $d->litrostarima=($request->get('ltst2')+$request->get('ltst1'));
        $d->update();
		
		$dat=Deposito::findOrFail($request->get('dep1'));
        $dat->uso=$dat->uso+$request->get('ltst1');
		$dat->tipo=$request->get('rexa');
        $dat->update();
		if($request->get('ltst1')>0){
		$rela=new Relacion;
        $rela->idprueba =   $data->idprueba;
        $rela->deposito = $request->get('dep1');
        $rela->tanque = $request->get('tan1');
        $rela->litros = $request->get('ltst1');
        $rela->litrosb = ($request->get('ltst1')*$d->plb)/100;
		$rela->save();
		
		}
		if($request->get('ltst2')>0){
		$rela=new Relacion;
        $rela->idprueba =   $data->idprueba;
        $rela->deposito = $request->get('dep2');
        $rela->tanque = $request->get('tan2');
        $rela->litros = $request->get('ltst2');
        $rela->litrosb = ($request->get('ltst2')*$d->plb)/100;
		$rela->save();
		}
		$dat2=Deposito::findOrFail($request->get('dep2'));
        $dat2->uso=$dat2->uso+$request->get('ltst2');
		$dat2->tipo=$request->get('rexa2');
        $dat2->update();
		
		$upt1=Tanques::findOrFail($request->get('tan1'));
        $upt1->uso=$upt1->uso+$request->get('ltst1');
		$upt1->tipo=$request->get('rexa');
        $upt1->update();
		
		$upt2=Tanques::findOrFail($request->get('tan2'));
        $upt2->uso=$upt2->uso+$request->get('ltst2');
		$upt2->tipo=$request->get('rexa2');
        $upt2->update();
		
       return Redirect::to('recepcion');

    }
	public function anular(Request $request){
		//dd($request);
		$d=Recoleccion::findOrFail($request->recoleccion);
        $d->anulada=1;
        $d->update();
		
		if($d->estatus==1){
			$lab=DB::table('laboratorio as la')
            -> where ('la.idrecoleccion','=',$request->recoleccion)
            ->first();
			$dat=Deposito::findOrFail($lab->dep);
			$dat->uso=$dat->uso-$lab->ltst1;
			$dat->update();
			
			$dat2=Deposito::findOrFail($lab->dep2);
			$dat2->uso=$dat2->uso-$lab->ltst2;
			$dat2->update();
			
			$upt1=Tanques::findOrFail($lab->tnq);
			$upt1->uso=$upt1->uso-$lab->ltst1;
			$upt1->update();
			
			$upt2=Tanques::findOrFail($lab->tnq2);
			$upt2->uso=$upt2->uso-$lab->ltst2;
			$upt2->update();
			
			$devs=Relacion::where('idprueba','=',$lab->idprueba)->get();
			$devs->toQuery()->update(['litros' => 0, 'litrosb' => 0]);
			
		}
			//dd($depodos);
	  return Redirect::to('recepcion');
	}
}
