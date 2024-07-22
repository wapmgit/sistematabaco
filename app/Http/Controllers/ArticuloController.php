<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Articulo;
use App\Models\Existencia;
use App\Models\Kardex;
use Carbon\Carbon;
use DB;
use Auth;

class ArticuloController extends Controller
{
 	public function index(Request $request){	
		$rol=DB::table('roles')-> select('newarticulo','editarticulo','entobar','stock')->where('iduser','=',$request->user()->id)->first();

		   $query=trim($request->get('searchText'));
			$datos=DB::table('articulos as ar')
            -> where ('ar.nombre','LIKE','%'.$query.'%')
            -> orderBy('ar.idarticulo','desc')
            ->paginate(20);  
				
			$jalea =DB::table('articulos as art')
			->join('existencia as ex','ex.idarticulo','=','art.idarticulo')
			->join('deposito as dep','dep.iddeposito','=','ex.idalmacen')
			-> select('ex.existencia','art.idarticulo')
			-> where ('ex.existencia','>=',24)
			-> where ('ex.idalmacen','=',2)
			-> where ('art.idarticulo','=',1)
			-> first();
	//	dd($jalea);
		return view('articulo.index',["jalea"=>$jalea,"rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
	public function create(){
		return view('articulo.create');
	}
	public function edit(Request $request,$id)
    {
	$rol=DB::table('roles')-> select('stock')->where('iduser','=',$request->user()->id)->first();
		$art=Articulo::find($id);
			return view('articulo.edit')
			->with('art',$art)
			->with('rol',$rol);

    }
	public function store (Request $request)
    {
		
		     $this->validate($request,[
            'nombre' => 'required',
            'precio' => 'required',
            'codigo' => 'required'
        ]);
        $dat=new Articulo;
        $dat->codigo=$request->get('codigo');
        $dat->nombre=$request->get('nombre');
        $dat->stock=0;
        $dat->precio=$request->get('precio');
		if($request->get('venta')){
			$dat->venta=1;
		}

        $dat->save();
     
				  $exis=new Existencia();
				  $exis->idalmacen=1;
				  $exis->idarticulo=$dat->idarticulo;
				  $exis->existencia=0;
				  $exis->save();  
	return Redirect::to('articulos');
    }
	public function show($id){
		$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		$datos=DB::table('articulos as a')
            ->where ('a.idarticulo','=',$id)
            -> first();

            $detalles=DB::table('kardex as da')
            -> where ('da.idarticulo','=',$id)
            ->get();

		return view("articulo.show",["datos"=>$datos,"detalles"=>$detalles,"empresa"=>$empresa]);
	}
	public function update(Request $request)
    {
		//dd($request);
        $dat=Articulo::findOrFail($request->id);
        $dat->nombre=$request->get('nombre');
        $dat->precio=$request->get('precio');
			if($request->get('venta')){
			$dat->venta=1;
			}else{
			$dat->venta=0;	
			}
        $dat->update();
       return Redirect::to('articulos');
    }
		public function pasartobo(Request $request)
    {
		//dd($request);
		//de la salida
		$user=Auth::user()->name;
		$articulo=Articulo::findOrFail($request->get('idproceso'));
		$articulo->stock=($articulo->stock-($request->get('cnt')*24));
		$articulo->update(); 
		
		$compra=Existencia::findOrFail($request->get('idproceso'));
		$compra->existencia=($compra->existencia-($request->get('cnt')*24));
		$compra->update(); 		

					$kar=new Kardex;
					$kar->fecha=$request->get('fecha');
					$kar->documento="PasoTobo-".$request->get('obs');
					$kar->idarticulo=$request->get('idproceso');
					$kar->cantidad=($request->get('cnt')*24);
					$kar->costo=$articulo->precio;
					$kar->tipo=2; 
					$kar->user=$user;
					$kar->save(); 
		//ed la entrada
		$arti=Articulo::findOrFail(2);
		$arti->stock=($arti->stock+$request->get('cnt'));
		$arti->update(); 
		
		$in=Existencia::findOrFail(2);
		$in->existencia=($in->existencia+$request->get('cnt'));
		$in->update(); 
		
					$kar=new Kardex;
					$kar->fecha=$request->get('fecha');
					$kar->documento="PasoTobo-".$request->get('obs');
					$kar->idarticulo=2;
					$kar->cantidad=$request->get('cnt');
					$kar->costo=$arti->precio;
					$kar->tipo=1; 
					$kar->user=$user;
					$kar->save();
		//actualizo stock tobos envase
		$arti=Articulo::findOrFail(4);
			$arti->stock=($arti->stock-$request->get('cnt'));
			$arti->update(); 
		$com=Existencia::findOrFail(10);
			$com->existencia=($com->existencia-$request->get('cnt'));
			$com->update(); 
		$kar=new Kardex;
			$mytime=Carbon::now('America/Caracas');
			$kar->fecha=$mytime->toDateTimeString();
			$kar->documento="PasoTobo-".$request->get('obs');;
			$kar->idarticulo=4;
			$kar->cantidad=$request->get('cnt');
			$kar->costo=$articulo->precio;
			$kar->tipo=2; 
			$kar->user=$user;
			$kar->save(); 			
       return Redirect::to('articulos');
    }
}
