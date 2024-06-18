<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Rutas;
use Carbon\Carbon;
use DB;

class RutasController extends Controller
{
 	public function index(Request $request){	
		$rol=DB::table('roles')-> select('newruta','editruta')->where('iduser','=',$request->user()->id)->first();

		   $query=trim($request->get('searchText'));
			$datos=DB::table('rutas as ru')
            -> where ('ru.nombre','LIKE','%'.$query.'%')
            -> orderBy('ru.idruta','desc')
            ->paginate(20);  
		return view('rutas.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
	public function create(){
		return view('rutas.create');
	}
	public function edit($id)
    {
		$ruta=Rutas::find($id);
			return view('rutas.edit')
			->with('ruta',$ruta);

    }
	public function store (Request $request)
    {
		     $this->validate($request,[
            'nombre' => 'required'
        ]);
        $dat=new Rutas;
        $dat->nombre=$request->get('nombre');
        $dat->telefono=$request->get('telefono');
        $dat->contacto=$request->get('contacto');
        $dat->save();
       return Redirect::to('rutas');

    }
}
