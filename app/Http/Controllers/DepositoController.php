<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Deposito;
use App\Models\Tanques;
use App\Models\Donacion;
use App\Models\Relacion;
use Carbon\Carbon;
use DB;
use Auth;

class DepositoController extends Controller
{
		   public function __construct()
	{
		$this->middleware('auth');
	}
 	public function index(Request $request){
		$rol=DB::table('roles')-> select('newdeposito','editdeposito','showdeposito','deposito')->where('iduser','=',$request->	user()->id)->first();
		   $query=trim($request->get('searchText'));
			$datos=DB::table('deposito as de')
            -> where ('de.nombre','LIKE','%'.$query.'%')
            -> orderBy('de.iddeposito','desc')
            ->paginate(30);		
		
		return view('deposito.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
	public function create(){
		return view('deposito.create');
	}
	public function store (Request $request)
    {	
		     $this->validate($request,[
            'descripcion' => 'required',
            'capacidad' => 'required'
        ]);
        $dat=new Deposito;
        $dat->descripcion=$request->get('descripcion');
        $dat->capacidad=$request->get('capacidad');
        $dat->movil=$request->get('movil');
        $dat->tanques=$request->get('tanques');
        $dat->estatus=0;
       $dat->save();
		$tanq = $request -> get('tnq');
			$cont = 0;
			  			//  dd(count($tanq)); 
            while($cont < count($tanq)){
				if(isset($tanq[$cont])){
				$det=new Tanques;
				$det->iddeposito=$dat->iddeposito;
				$det->nombre="Tanque".($cont+1);
				$det->capacidad=$tanq[$cont];
				$det->uso=0;
				$det->tipo="";
				$det->save();  }
				$cont=$cont+1;
			}
			//dd($tanq);
       return Redirect::to('deposito');
    }
	public function edit($id)
    {
		$dep=Deposito::find($id);
			return view('deposito.edit')
			->with('dep',$dep);
    }
		public function update(Request $request)
    {
        $dat=Deposito::findOrFail($request->id);
        $dat->nombre=$request->get('nombre');
        $dat->encargado=$request->get('encargado');
        $dat->movil=$request->get('telefono');
        $dat->update();
		
       return Redirect::to('deposito');
    }
		public function show (Request $request)
    {
		$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();	
		$datos=DB::table('deposito as de')
		->join('existencia as ex','ex.idalmacen','=','de.iddeposito')
		->join('articulos as ar','ar.idarticulo','=','ex.idarticulo')
			->select ('ar.*','ex.existencia as cantidad')
			->where('de.iddeposito','=',$request->get('id'))
            ->get();
		$dep=DB::table('deposito')->where('iddeposito','=',$request->get('id'))->first();
      	return view('deposito.show',["datos"=>$datos,"empresa"=>$empresa,"dep"=>$dep]);
    }

}
