<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cocedor;
use App\Models\Clientes;
use Carbon\Carbon;
use DB;

class ReportesController extends Controller
{
	public function analisis(Request $request)
    {	
		$corteHoy = date("Y-m-d");
		$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		$rol=DB::table('roles')-> select('analisis')->where('iduser','=',$request->user()->id)->first();
        $query=trim($request->get('searchText'));
        $query2=trim($request->get('searchText2'));
		
			if (($query)==""){$query=$corteHoy; }

 			 $datos=DB::table('produccion as pr')
            ->join ('cocedor as co', 'co.idcocedor','=','pr.idcocedor')
			-> select(DB::raw('sum(pr.kgsubido) as kgs'),DB::raw('sum(pr.kgcocina) as kgc'),DB::raw('sum(pr.kgbajado) as kgb'),DB::raw('sum(pr.kgjalea) as kgj'),DB::raw('sum(pr.kgtren) as kgt'),DB::raw('avg(pr.rendimiento) as rendi'),'co.nombre')
			->whereBetween('pr.fecha', [$query, $query2])
			->where('pr.estatus','=',1)
			->groupby('co.idcocedor')
            ->get();

	if($rol->analisis==1){
        return view('reportes.analisis.cocedores.index',["empresa"=>$empresa,"datos"=>$datos,"searchText"=>$query,"searchText2"=>$query2]);    
    }else {
	return view("reportes.mensajes.noautorizado");
	}
	}
	public function reportcocedor(Request $request)
    {			
			$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		   	$rut = Cocedor::all();
        return view('reportes.cocedor.cocedor.index',["empresa"=>$empresa,"rut"=>$rut]);    
    }
	
	public function reporteclientes(Request $request)
    {	
	$rol=DB::table('roles')-> select('rclientes')->where('iduser','=',$request->user()->id)->first();
		$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
			$rec=DB::table('clientes as ru')
            ->get();
			
		if($rol->rclientes==1){
			return view('reportes.clientes.clientes.index',["empresa"=>$empresa,"rec"=>$rec]);   
		}else {
			return view("reportes.mensajes.noautorizado");
		}			
    }

		public function reportventas(Request $request)
    {	
		$rol=DB::table('roles')-> select('rventas')->where('iduser','=',$request->user()->id)->first();
		$corteHoy = date("Y-m-d");
        $empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
        $query=trim($request->get('searchText'));
        $query2=trim($request->get('searchText2'));
		
			if (($query)==""){$query=$query2=$corteHoy; }

            $datos=DB::table('entrega as e')
            ->join ('clientes as c', 'c.idcliente','=','e.idcliente')
			->whereBetween('e.fecha', [$query, $query2])
            ->get();

			if($rol->rventas==1){
	//	$query2=date("Y-m-d",strtotime($query2."- 1 days"));
        return view('reportes.ventas.venta.index',["empresa"=>$empresa,"datos"=>$datos,"searchText"=>$query,"searchText2"=>$query2]);  
    }else {
	return view("reportes.mensajes.noautorizado");
	}		
    }
	public function reportventascliente(Request $request)
    {	
		$rol=DB::table('roles')-> select('rventas')->where('iduser','=',$request->user()->id)->first();
		$corteHoy = date("Y-m-d");
        $empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
        $clientes=DB::table('clientes')->get();
        $query=trim($request->get('searchText'));
        $query2=trim($request->get('searchText2'));
		
			if (($query)==""){$query=$query2=$corteHoy; }

            $datos=DB::table('entrega as e')
            ->join ('clientes as c', 'c.idcliente','=','e.idcliente')
			->whereBetween('e.fecha', [$query, $query2])
			->where('e.idcliente','=',$request->get('cliente'))
            ->get();

			if($rol->rventas==1){
	//	$query2=date("Y-m-d",strtotime($query2."- 1 days"));
        return view('reportes.ventas.ventacliente.index',["clientes"=>$clientes,"empresa"=>$empresa,"datos"=>$datos,"searchText"=>$query,"searchText2"=>$query2]);  
    }else {
	return view("reportes.mensajes.noautorizado");
	}		
    }
			public function reportproduccion(Request $request)
    {	
		$corteHoy = date("Y-m-d");
        $empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
$rol=DB::table('roles')-> select('rproduccion')->where('iduser','=',$request->user()->id)->first();
        $query=trim($request->get('searchText'));
        $query2=trim($request->get('searchText2'));
		
			if (($query)==""){$query=$corteHoy; }

            $datos=DB::table('produccion as pr')
			->join('cocedor as co','co.idcocedor','=','pr.idcocedor')
            ->join ('parrillas as pa', 'pa.idparrilla','=','pr.idparrilla')
            ->join ('turnos as tu', 'tu.idturno','=','pr.idturno')
			-> select('pr.*','pa.nombre as parrilla','tu.nombreturno','co.nombre')
			->whereBetween('pr.fecha', [$query, $query2])
			->where('pr.estatus','=',1)
			->groupby('pr.idproceso')
            ->get();
			   $datosparrilla=DB::table('produccion as pr')
            ->join ('parrillas as pa', 'pa.idparrilla','=','pr.idparrilla')
			-> select(DB::raw('sum(pr.kgsubido) as kgs'),DB::raw('sum(pr.kgcocina) as kgc'),DB::raw('sum(pr.kgbajado) as kgb'),DB::raw('sum(pr.kgjalea) as kgj'),DB::raw('sum(pr.kgtren) as kgt'),DB::raw('avg(pr.rendimiento) as rendi'),'pa.nombre as parrilla')
			->whereBetween('pr.fecha', [$query, $query2])
			->where('pr.estatus','=',1)
			->groupby('pr.idparrilla')
            ->get();
			$datosturno=DB::table('produccion as pr')
            ->join ('turnos as tu', 'tu.idturno','=','pr.idturno')
			-> select(DB::raw('sum(pr.kgsubido) as kgs'),DB::raw('sum(pr.kgcocina) as kgc'),DB::raw('sum(pr.kgbajado) as kgb'),DB::raw('sum(pr.kgjalea) as kgj'),DB::raw('sum(pr.kgtren) as kgt'),DB::raw('avg(pr.rendimiento) as rendi'),'tu.nombreturno')
			->whereBetween('pr.fecha', [$query, $query2])
			->where('pr.estatus','=',1)
			->groupby('tu.idturno')
            ->get();
			if ($rol->rproduccion==1){
        return view('reportes.produccion.index',["datosturno"=>$datosturno,"datosparrilla"=>$datosparrilla,"empresa"=>$empresa,"datos"=>$datos,"searchText"=>$query,"searchText2"=>$query2]);
		} else { 
		return view("reportes.mensajes.noautorizado");
		}		
    }
		public function inventario(Request $request)
    {	
			$empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
			$uso=DB::table('articulos as t')->get();
			$deposito=DB::table('deposito')->get();
			$rol=DB::table('roles')-> select('rinventario')->where('iduser','=',$request->user()->id)->first();
		$inv=DB::table('existencia as ex')
		->join('articulos as ar','ar.idarticulo','=','ex.idarticulo')
		->get();

		$depo=DB::table('existencia as ex')
		->join('deposito as de','de.iddeposito','=','ex.idalmacen')
		->join('articulos as ar','ar.idarticulo','=','ex.idarticulo')
		->orderBy('de.iddeposito','asc')
		->get();
		//dd($depo);
		if ($rol->rinventario==1){
        return view('reportes.inventario.inventario.index',["inv"=>$inv,"deposito"=>$deposito,"empresa"=>$empresa,"uso"=>$uso,"depo"=>$depo]);  
	} else { 
		return view("reportes.mensajes.noautorizado");
		}			
    }
	
	public function inventariofecha(Request $request)
    {	
	//dd($request);
		$corteHoy = date("Y-m-d");
        $empresa=DB::table('empresa')-> where('idempresa','=','1')->first();
		$rol=DB::table('roles')-> select('rinventario')->where('iduser','=',$request->user()->id)->first();
        $query=trim($request->get('searchText'));
		
			if (($query)==""){$query=$corteHoy; }

            $datos=DB::table('mov_existencias as me')
			->join('deposito as dep','dep.iddeposito','=','me.deposito')
            ->join ('articulos as art', 'art.idarticulo','=','me.articulo')
			-> select('me.*','dep.nombre as deposito','art.nombre as articulo')
			->where('me.articulo','=',$request->get('articulo'))
			->where('me.deposito','=',$request->get('deposito'))
			->where('me.fecha','=',$query)
			->orderby('me.idmov','asc')
            ->get();
			//dd($datos);
			 $info=DB::table('mov_existencias as me')
			->join('deposito as dep','dep.iddeposito','=','me.deposito')
            ->join ('articulos as art', 'art.idarticulo','=','me.articulo')
			-> select('me.*','dep.nombre as deposito','art.nombre as articulo')
			->where('me.articulo','=',$request->get('articulo'))
			->where('me.deposito','=',$request->get('deposito'))
			->orderby('me.idmov','asc')
            ->first();	
		//dd($info);			
		$depo=DB::table('deposito')->get();
		$articulos=DB::table('articulos')->get();
		//$query=$corteHoy;
			if ($rol->rinventario==1){
        return view('reportes.inventariofecha.index',["info"=>$info,"depo"=>$depo,"articulos"=>$articulos,"empresa"=>$empresa,"datos"=>$datos,"searchText"=>$query]);
		} else { 
		return view("reportes.mensajes.noautorizado");
		}		
    }

}
