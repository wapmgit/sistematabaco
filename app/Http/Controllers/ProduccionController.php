<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Produccion;
use App\Models\Cocedor;
use App\Models\ParrillaTurno;
use App\Models\Parrilla;
use App\Models\Kardex;
use App\Models\Existencia;
use App\Models\MovExistencia;
use App\Models\Articulo;
use Carbon\Carbon;
use DB;
use Auth;

class ProduccionController extends Controller
{
 	public function index(Request $request){	
		$rol=DB::table('roles')-> select('newproceso','showproduccion','closeproceso')->where('iduser','=',$request->user()->id)->first();

		   $query=trim($request->get('searchText'));
			$datos=DB::table('produccion as pr')
			->join('cocedor as co','co.idcocedor','=','pr.idcocedor')
			->join('parrillas as pa','pa.idparrilla','=','pr.idparrilla')
			->join('turnos as tu','tu.idturno','=','pr.idturno')
			->select('pr.*','pa.nombre as parrilla','tu.nombreturno as turno','co.nombre as cocedor')
            -> where ('co.nombre','LIKE','%'.$query.'%')
            -> orderBy('pr.idproceso','desc')
            ->paginate(20);  
		return view('produccion.index',["rol"=>$rol,"datos"=>$datos,"searchText"=>$query]);
	}
		public function create(Request $request){
		$rol=DB::table('roles')-> select('newproceso')->where('iduser','=',$request->user()->id)->first();	
		if ($rol->newproceso==1){	
			$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();
			$parrillas =DB::table('parrillas')-> get();
			$turnos =DB::table('turnos')-> get();
			$art=Articulo::findOrFail(3);
			$cocedores =DB::table('cocedor')->where('activo','=',0)-> get();

			return view("produccion.create",["art"=>$art,"rol"=>$rol,"parrillas"=>$parrillas,"turnos"=>$turnos,"cocedores"=>$cocedores,"empresa"=>$empresa]);
		} else { 
		return view("reportes.mensajes.noautorizado");
		}
    }
		public function store (Request $request)
    {		
	$user=Auth::user()->name;
	$userid=Auth::user()->id;
	//dd($request);
		     $this->validate($request,[
            'turno' => 'required',
            'cocedor' => 'required'
        ]);
		$parri=explode("_",$request->get('parri'));
		$idparri=$parri[0];
        $data=new Produccion;
        $data->idsupervisor = $userid;
        $data->idparrilla = $idparri;
        $data->idcocedor = $request->get('cocedor');
        $data->idturno = $request->get('turno');
        $data->kgsubido =$request->get('kgsubido');
        $data->kgcocina =$request->get('kgcocina');
        $data->observacion = $request->get('observacion');
		$mytime=Carbon::now('America/Caracas');
		$data->fecha=$request->get('fecha');
		$data->usuario = $user;
        $data->save();
		
		$turnos=DB::table('parrillaturno')
		->where('parrilla','=',$idparri)
		->where('turno','=',$request->get('turno'))
		->first();
		$dat2=ParrillaTurno::findOrFail($turnos->id);
		$dat2->status=1;
        $dat2->update();
		
		$act=Cocedor::findOrFail($request->get('cocedor'));
		$act->activo=1;
        $act->update();
		//act stock
		$articulo=Articulo::findOrFail(3);
		$articulo->stock=($articulo->stock-$request->get('kgsubido'));
		$articulo->update(); 
		
				

				$compra=Existencia::findOrFail(3);
				$exisant=$compra->existencia;
				$compra->existencia=($compra->existencia-$request->get('kgsubido'));
				$compra->update(); 	
				
				$movart=new MovExistencia;
				$movart->tipo="PRO";
				$movart->iddoc=$data->idproceso;
				$movart->deposito=1;
				$movart->articulo=3;
				$movart->cantidad=$request->get('kgsubido')*-1;
				$movart->fecha=$mytime->toDateTimeString();
				$movart->exisant=$exisant;
				$movart->usuario=$user;
				$movart->save();
				
					$kar=new Kardex;
					$kar->fecha=$mytime->toDateTimeString();
					$kar->documento="PRO-".$data->idproceso;
					$kar->idarticulo=3;
					$kar->cantidad=$request->get('kgsubido');
					$kar->costo=$articulo->precio;
					$kar->tipo=2; 
					$kar->user=$user;
					$kar->save();  
					
       return Redirect::to('produccion');

    }
		public function show($id){
		
		$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		$datos=DB::table('produccion as pr')
			->join('cocedor as co','co.idcocedor','=','pr.idcocedor')
			->join('parrillas as pa','pa.idparrilla','=','pr.idparrilla')
			->join('turnos as tu','tu.idturno','=','pr.idturno')
			->select('pr.*','pa.nombre as parrilla','tu.nombreturno as turno','co.nombre as cocedor','co.cedula')
			->where('pr.idproceso','=',$id)
			->first();
		$sup=DB::table('users')->where('id','=',$datos->idsupervisor)
		->select('name')
		->first();
		return view("produccion.show",["datos"=>$datos,"empresa"=>$empresa,"supervisor"=>$sup]);
	}
		 public function listarturno(Request $request){

        if($request->ajax()){
			$parri=explode("_",$request->get('parri'));
			$idparri=$parri[0];
		$turnos=DB::table('parrillaturno as pt')
		->join('turnos','turnos.idturno','=','pt.turno')
		->select('turnos.idturno','turnos.nombreturno')
		-> where('pt.parrilla','=',$idparri)
		-> where('pt.status','=',0)
		->groupby('turnos.idturno')
		->get();
			//	dd($turnos);
		 return response()->json($turnos);
		}    
     }
	 public function closeproduccion(Request $request){
		/// dd($request);
		$mytime=Carbon::now('America/Caracas');
		$user=Auth::user()->name;
		$actp=Produccion::findOrFail($request->get('idproceso'));
		$actp->kgbajado=$request->get('kgb');
		$actp->kgjalea=$request->get('kgj');
		$actp->fechacierre=$request->get('fecha');
		$actp->rendimiento=((100*$request->get('kgj'))/$request->get('kgb'));
		$actp->kgtren=($actp->kgcocina-$request->get('kgb'));
		$actp->estatus=1;
		$actp->observacion=$actp->observacion." / ".$request->get('obs');
        $actp->update();
				
		$acp=Parrilla::findOrFail($actp->idparrilla);
		$acp->tren=($actp->kgcocina-$request->get('kgb'));
        $acp->update();
		
		$acc=Cocedor::findOrFail($actp->idcocedor);
		$acc->activo=0;
        $acc->update();
		
		$turnos=DB::table('parrillaturno')
		->where('parrilla','=',$actp->idparrilla)
		->where('turno','=',$actp->idturno)
		->first();
		
		$dat2=ParrillaTurno::findOrFail($turnos->id);
		$dat2->status=0;
        $dat2->update();
		//actualizo stock jalea
		$articulo=Articulo::findOrFail(1);
		$articulo->stock=($articulo->stock+$request->get('sobrante'));
		$articulo->update(); 
				
				$compra=Existencia::findOrFail(1);
				$exisant=$compra->existencia;
				$compra->existencia=($compra->existencia+$request->get('sobrante'));
				$compra->update();
				
				$movart=new MovExistencia;
				$movart->tipo="PRO";
				$movart->iddoc=$request->get('idproceso');
				$movart->deposito=2;
				$movart->articulo=1;
				$movart->cantidad=$request->get('sobrante');
				$movart->fecha=$request->get('fecha');
				$movart->exisant=$exisant;
				$movart->usuario=$user;
				$movart->save();
				
					$kar=new Kardex;
					$mytime=Carbon::now('America/Caracas');
					$kar->fecha=$request->get('fecha');
					$kar->documento="PRO-".$request->get('idproceso')." ".$acp->nombre." T".$turnos->turno;
					$kar->idarticulo=1;
					$kar->cantidad=$request->get('sobrante');
					$kar->costo=$articulo->precio;
					$kar->tipo=1; 
					$kar->user=$user;
					$kar->save(); 
		//actualizo stock tobos jalea
		$arti=Articulo::findOrFail(2);
			$arti->stock=($arti->stock+$request->get('tobo'));
			$arti->update(); 
		$com=Existencia::findOrFail(2);
		$exisant=$com->existencia;
			$com->existencia=($com->existencia+$request->get('tobo'));
			$com->update(); 
			
			$movart=new MovExistencia;
				$movart->tipo="PRO";
				$movart->iddoc=$request->get('idproceso');
				$movart->deposito=2;
				$movart->articulo=2;
				$movart->cantidad=$request->get('tobo');
				$movart->fecha=$request->get('fecha');
				$movart->exisant=$exisant;
				$movart->usuario=$user;
				$movart->save();
			
			$kar=new Kardex;
			$mytime=Carbon::now('America/Caracas');
			$kar->fecha=$request->get('fecha');
			$kar->documento="PRO-".$request->get('idproceso')." ".$acp->nombre." T".$turnos->turno;
			$kar->idarticulo=2;
			$kar->cantidad=$request->get('tobo');
			$kar->costo=$articulo->precio;
			$kar->tipo=1; 
			$kar->user=$user;
			$kar->save(); 		
		//actualizo stock tobos envase
		$arti=Articulo::findOrFail(4);
			$arti->stock=($arti->stock-$request->get('tobo'));
			$arti->update(); 
		$com=Existencia::findOrFail(10);
		$exisant=$com->existencia;
			$com->existencia=($com->existencia-$request->get('tobo'));
			$com->update(); 
			
			$movart=new MovExistencia;
				$movart->tipo="PRO";
				$movart->iddoc=$request->get('idproceso');
				$movart->deposito=2;
				$movart->articulo=4;
				$movart->cantidad=($request->get('tobo')*-1);
				$movart->fecha=$request->get('fecha');
				$movart->exisant=$exisant;
				$movart->usuario=$user;
				$movart->save();
				
		$kar=new Kardex;
			$mytime=Carbon::now('America/Caracas');
			$kar->fecha=$request->get('fecha');
			$kar->documento="PRO-".$request->get('idproceso')." ".$acp->nombre." T".$turnos->turno;
			$kar->idarticulo=4;
			$kar->cantidad=$request->get('tobo');
			$kar->costo=$articulo->precio;
			$kar->tipo=2; 
			$kar->user=$user;
			$kar->save(); 			
		return Redirect::to('produccion');
	 }
}
