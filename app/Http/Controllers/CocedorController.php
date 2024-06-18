<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cocedor;
use Carbon\Carbon;
use DB;

class CocedorController extends Controller
{
 	public function index(Request $request){	
		$rol=DB::table('roles')-> select('newcocedor','editcocedor')->where('iduser','=',$request->user()->id)->first();
		   $query=trim($request->get('searchText'));
			$datos=DB::table('cocedor as ru')
            -> where ('ru.nombre','LIKE','%'.$query.'%')
            -> orderBy('ru.nombre','desc')
            ->paginate(20);  
		return view('cocedores.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
	public function create(){
		return view('cocedores.create');
	}
	public function edit($id)
    {
		$recolector=Cocedor::find($id);
			return view('cocedores.edit')
			->with('recolector',$recolector);

    }
	public function update(Request $request)
    {
	$this->validate($request,[
            'nombre' => 'required'
        ]);
        $cat=Cocedor::findOrFail($request->id);
        $cat->nombre=$request->get('nombre');
        $cat->telefono=$request->get('telefono');
        $cat->cedula=$request->get('cedula');
        $cat->update();
       return Redirect::to('cocedores');
    }
	public function store (Request $request)
    {
		//dd($request);
		     $this->validate($request,[
            'nombre' => 'required'
        ]);
        $dat=new Cocedor;
        $dat->nombre=$request->get('nombre');
        $dat->telefono=$request->get('telefono');
        $dat->cedula=$request->get('cedula');
        $dat->save();
       return Redirect::to('cocedores');

    }
}
