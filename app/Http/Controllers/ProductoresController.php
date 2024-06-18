<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rutas;
use App\Models\Productores;
use Carbon\Carbon;
use DB;
class ProductoresController extends Controller
{
 	public function index(Request $request){	
	$rol=DB::table('roles')-> select('newproductor','editproductor')->where('iduser','=',$request->user()->id)->first();
		   $query=trim($request->get('searchText'));
			$datos=DB::table('productores as p')
			->join('rutas as ru','ru.idruta','=','p.idruta')
            -> where ('p.nombre','LIKE','%'.$query.'%')
            ->select('p.idproductor','p.nombre','p.codigo','p.telefono','p.tipo','ru.nombre as ruta')
			-> orderBy('p.nombre','desc')
            ->get();  
		return view('productores.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
	public function create(){
		$ruta=Rutas::all();
		return view('productores.create')
			->with('ruta',$ruta);
	}
	public function store (Request $request)
    {
		     $this->validate($request,[
            'nombre' => 'required'
        ]);
        $dat=new Productores;
        $dat->nombre=$request->get('nombre');
        $dat->telefono=$request->get('telefono');
        $dat->codigo=$request->get('codigo');
        $dat->idruta=$request->get('ruta');
        $dat->tipo=$request->get('tipo');
        $dat->save();
       return Redirect::to('productores');

    }
	public function edit($id)
    {
		$ruta=Rutas::all();
		$productor=Productores::find($id);
			return view('productores.edit')
			->with('productor',$productor)
			->with('ruta',$ruta);

    }
	public function update(Request $request)
    {
        $dat=Productores::findOrFail($request->id);
        $dat->nombre=$request->get('nombre');
        $dat->codigo=$request->get('codigo');
        $dat->telefono=$request->get('telefono');
        $dat->idruta=$request->get('ruta');
        $dat->tipo=$request->get('tipo');
        $dat->update();
       return Redirect::to('productores');
    }
}
