<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Clientes;
use App\Models\Controltobos;
use App\Models\Kardex;
use App\Models\Existencia;
use App\Models\Articulo;
use App\Models\Deposito;
use Carbon\Carbon;
use DB;
use Auth;

class ClientesController extends Controller
{
 	public function index(Request $request){	
	$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
		$rol=DB::table('roles')-> select('clientes','newcliente','editcliente','controltobos','movtobos')->where('iduser','=',$request->user()->id)->first();

		   $query=trim($request->get('searchText'));
			$datos=DB::table('clientes')
            -> where ('nombre','LIKE','%'.$query.'%')
            -> orderBy('idcliente','desc')
            ->paginate(20); 

		$depositos=DB::table('deposito as dep')
		->join('existencia as ex','ex.idalmacen','=','dep.iddeposito')
		->select('dep.iddeposito','dep.nombre','ex.existencia')
		->where ('ex.idarticulo','=',4)
		-> get();
			if($rol->clientes==1){
		return view('clientes.cliente.index',["depositos"=>$depositos,"rol"=>$rol,"datos"=>$datos,"empresa"=>$empresa,"searchText"=>$query]);
		    }else {
	return view("reportes.mensajes.noautorizado");
	}
	}
	public function create(Request $request)
	{
		$rol=DB::table('roles')-> select('newcliente')->where('iduser','=',$request->user()->id)->first();	
		if ($rol->newcliente==1){
		return view("clientes.create");
		} else { 
		return view("reportes.mensajes.noautorizado");
		}
	
	}
	public function validar (Request $request){
		if($request->ajax()){
			$pacientes=DB::table('clientes')->where('cedula','=',$request->get('cedula'))->get();
			return response()->json($pacientes);
		}     
    }
		public function show ($id){
		$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
		$data=DB::table('controltobos as ctrl')
		-> join ('deposito as dep','dep.iddeposito','=','ctrl.deposito')
		->select('ctrl.*','dep.nombre')
		->where ('ctrl.idcliente','=',$id)
		-> get();
		$cliente=Clientes::findOrFail($id);
		//	dd($detalle);
		return view("clientes.cliente.show",["empresa"=>$empresa,"data"=>$data,"cliente"=>$cliente]);

    }

	public function store (Request $request)
    {
	$this->validate($request,[
            'nombre' => 'required',
            'cedula' => 'required'
        ]);
        $cliente=new Clientes;
        $cliente->nombre=$request->get('nombre');
        $cliente->cedula=$request->get('cedula');
        $cliente->telefono=$request->get('telefono');
        $cliente->direccion=$request->get('direccion');
		$mytime=Carbon::now('America/Caracas');
		$cliente->creado=$mytime->toDateTimeString();
        $cliente->save();
        return Redirect::to('clientes');

    }
	public function edit($id)
	{
		return view("clientes.edit",["cliente"=>Clientes::findOrFail($id)]);
	}
	public function update(Request $request)
	{
			$this->validate($request,[
            'nombre' => 'required',
            'cedula' => 'required'
        ]);
		$paciente=Clientes::findOrFail($request->get('id'));
        $paciente->nombre=$request->get('nombre');
        $paciente->cedula=$request->get('cedula');
        $paciente->telefono=$request->get('telefono');
    	$paciente->direccion=$request->get('direccion');
        $paciente->update();
        return Redirect::to('clientes');
	}
	public function controltobos(Request $request)
	{
		//dd($request);
		$mov=new controltobos;
        $mov->idcliente=$request->get('idcliente');
        $mov->tipo=$request->get('tipo');
        $mov->deposito=$request->get('deposito');
        $mov->cantidad=$request->get('cantidad');
        $mov->observacion=$request->get('observacion');
		$mytime=Carbon::now('America/Caracas');
		$mov->fecha=$mytime->toDateTimeString();
		$mov->usuario=Auth::user()->name;
        $mov->save();
			$cli=Clientes::findOrFail($request->get('idcliente'));
				if($request->get('tipo')==1){
					$tipomov=1;
				$cli->tobos=($cli->tobos-$request->get('cantidad'));	
				}else{
					$tipomov=2;
				$cli->tobos=($cli->tobos+$request->get('cantidad'));	
				}
			$cli->update(); 
		//del stock
		$articulo=Articulo::findOrFail(4);
				if($request->get('tipo')==1){
				$articulo->stock=($articulo->stock+$request->get('cantidad'));	
				}else{
				$articulo->stock=($articulo->stock-$request->get('cantidad'));	
				}
				
				$articulo->update(); 
				
					$kar=new Kardex;
					$kar->fecha=$mytime->toDateTimeString();
					$kar->documento="CONTROL-".$mov->id;
					$kar->idarticulo=4;
					$kar->cantidad=$request->get('cantidad');
					$kar->costo=$articulo->precio;
					$kar->tipo=$tipomov; 
					$kar->user=Auth::user()->name;
					 $kar->save();   
				
				$mov=DB::table('existencia')->where('idalmacen','=',$request->get('deposito'))->where('idarticulo','=',4)->first();
				$idmov=$mov->id;
				$compra=Existencia::findOrFail($idmov);
				if($request->get('tipo')==1){
				$compra->existencia=($compra->existencia+$request->get('cantidad'));	
				}else{
				$compra->existencia=($compra->existencia-$request->get('cantidad'));
				}
				$compra->update(); 
			
			return Redirect::to('clientes');
	}
}
