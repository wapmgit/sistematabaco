<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {		
	$corteHoy = date("Y-m-d");
	//$corteHoy=date("Y-m-d",strtotime($corteHoy."- 1 days"));
	$pro =DB::table('produccion')
	-> select(DB::raw('sum(estatus) as result'),DB::raw('count(idproceso) as recep'),DB::raw('sum(kgsubido) as kgs'),DB::raw('sum(kgcocina) as kgc'),DB::raw('sum(kgbajado) as kgb'),DB::raw('sum(kgjalea) as kgj'),DB::raw('sum(kgtren) as kgt'))
	-> where('fechacierre','=',$corteHoy) 
	-> where('estatus','=',1) 
	-> first();
	$dep =DB::table('parrillas as pr')->join('produccion as p','p.idparrilla','=','pr.idparrilla')
	->select('pr.idparrilla',DB::raw('sum(p.kgcocina) as kgc'),DB::raw('sum(p.kgjalea) as kgj'))
	-> where('p.fecha','=',$corteHoy) 
	->groupby('pr.idparrilla')
	->get();

//	dd($query2);
		$y = date("Y");
		$vene =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0101',$y.'0131']) -> first();
		$vfeb =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0201',$y.'0231']) -> first();
		$vmar =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0301',$y.'0331']) -> first();
		$vabr =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0401',$y.'0430']) -> first();
		$vmay =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0501',$y.'0530']) -> first();
		$vjun =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0601',$y.'0630']) -> first();
		$vjul =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0701',$y.'0731']) -> first();
		$vago =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0801',$y.'0831']) -> first();
		$vsep =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'0901',$y.'0931']) -> first();
		$voct =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'1001',$y.'1101']) -> first();
		$vnov =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'1101',$y.'1131']) -> first();
		$vdic =DB::table('produccion')-> select(DB::raw('sum(kgjalea) as total '))-> whereBetween('fechacierre', [$y.'1201',$y.'1231']) -> first();
        
		
        $cene =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0101',$y.'0131']) -> first(); 
		$cfeb =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0201',$y.'0231']) -> first();
		$cmar =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0301',$y.'0331']) -> first();
		$cabr =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0401',$y.'0430']) -> first();
		$cmay =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0501',$y.'0530']) -> first();
		$cjun =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fechacierre', [$y.'0601',$y.'0630']) -> first();
		$cjul =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0701',$y.'0731']) -> first();
		$cago =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0801',$y.'0831']) -> first();
		$csep =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'0901',$y.'0931']) -> first();
		$coct =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'1001',$y.'1031']) -> first();
		$cnov =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'1101',$y.'1131']) -> first();
		$cdic =DB::table('produccion')-> select(DB::raw('avg(rendimiento) as total '))-> whereBetween('fecha', [$y.'1201',$y.'1231']) -> first();
        
		
        return view('home',["dep"=>$dep,"pro"=>$pro,"vene"=>$vene,"vfeb"=>$vfeb,"vmar"=>$vmar,"vabr"=>$vabr,"vmay"=>$vmay,"vjun"=>$vjun,"vjul"=>$vjul,"vago"=>$vago,"cene"=>$cene,"cfeb"=>$cfeb,"cmar"=>$cmar,"cmay"=>$cmay,"cabr"=>$cabr,"cjun"=>$cjun,"cjul"=>$cjul,"cago"=>$cago,"csep"=>$csep,"vsep"=>$vsep,"voct"=>$voct,"coct"=>$coct,"vnov"=>$vnov,"cnov"=>$cnov,"vdic"=>$vdic,"cdic"=>$cdic]);
        //return view('home');
    }
		public function usuarios(Request $request)
	{
		//dd($request);
		$rol=DB::table('roles')-> select('actroles','updatepass')->where('iduser','=',$request->user()->id)->first();	
			if ($rol->actroles==1){			
			$user=DB::table('users')->join('roles','users.id','=','roles.iduser')
			->get();
			return view('sistema.roles.usuarios',["empresa"=>$user,"rol"=>$rol]);							  
			} else { 
		return view("reportes.mensajes.noautorizado");
	}
		
	}
			public function info(Request $request)
	{
			$empresa=DB::table('empresa')->join('sistema','sistema.idempresa','=','empresa.idempresa')->first();		
			return view('sistema.info',["empresa"=>$empresa]);							  

	}
	
		 public function updtuser(Request $request)
    {
		//dd($request);
		$data=Roles::findOrFail($request->get('rol'));
		$usuario=$data->iduser;
		if ($request->get('op1')){ $data->newarticulo=1; }else{ $data->newarticulo=0; }
		if ($request->get('op2')){ $data->editarticulo=1; }else{ $data->editarticulo=0; }
		if ($request->get('op3')){ $data->newcocedor=1; }else{ $data->newcocedor=0; }
		if ($request->get('op4')){ $data->editcocedor=1; }else{ $data->editcocedor=0; }
		if ($request->get('op5')){ $data->newcliente=1; }else{ $data->newcliente=0; }
		if ($request->get('op6')){ $data->editcliente=1; }else{ $data->editcliente=0; }
		if ($request->get('op7')){ $data->newdeposito=1; }else{ $data->newdeposito=0; }
		if ($request->get('op8')){ $data->editdeposito=1; }else{ $data->editdeposito=0; }
		if ($request->get('op9')){ $data->showdeposito=1; }else{ $data->showdeposito=0; }
		if ($request->get('op10')){ $data->newajuste=1; }else{ $data->newajuste=0; }
		if ($request->get('op11')){ $data->showajuste=1; }else{ $data->showajuste=0; }
		if ($request->get('op12')){ $data->newproceso=1; }else{ $data->newproceso=0; }
		if ($request->get('op13')){ $data->showproduccion=1; }else{ $data->showproduccion=0; }
		if ($request->get('op14')){ $data->closeproceso=1; }else{ $data->closeproceso=0; }
		if ($request->get('op16')){ $data->ventas=1; }else{ $data->ventas=0; }
		if ($request->get('op17')){ $data->newventa=1; }else{ $data->newventa=0; }
		if ($request->get('op18')){ $data->showventa=1; }else{ $data->showventa=0; }
		if ($request->get('op19')){ $data->anularventa=1; }else{ $data->anularventa=0; }
		if ($request->get('op20')){ $data->newtraslado=1; }else{ $data->newtraslado=0; }
		if ($request->get('op21')){ $data->showtraslado=1; }else{ $data->showtraslado=0; }
		if ($request->get('op22')){ $data->rinventario=1; }else{ $data->rinventario=0; }
		if ($request->get('op23')){ $data->rventas=1; }else{ $data->rventas=0; }
		if ($request->get('op24')){ $data->rproduccion=1; }else{ $data->rproduccion=0; }
		if ($request->get('op25')){ $data->analisis=1; }else{ $data->analisis=0; }
		if ($request->get('op26')){ $data->actroles=1; }else{ $data->actroles=0; }
		if ($request->get('op27')){ $data->updatepass=1; }else{ $data->updatepass=0; }
		if ($request->get('op28')){ $data->controltobos=1; }else{ $data->controltobos=0; }
		if ($request->get('op29')){ $data->movtobos=1; }else{ $data->movtobos=0; }
		if ($request->get('op30')){ $data->entobar=1; }else{ $data->entobar=0; }
		if ($request->get('op31')){ $data->rclientes=1; }else{ $data->rclientes=0; }
		if ($request->get('op32')){ $data->clientes=1; }else{ $data->clientes=0; }
		if ($request->get('op33')){ $data->ajuste=1; }else{ $data->ajuste=0; }
		if ($request->get('op34')){ $data->stock=1; }else{ $data->stock=0; }
		if ($request->get('op35')){ $data->deposito=1; }else{ $data->deposito=0; }

		$data ->update();
			
		$user=DB::table('users')->join('roles','users.id','=','roles.iduser')
			->get();
		   
         return Redirect::to('usuarios');
	}
				public function updatepass(Request $request)
	{
		//dd($request);
    $user = Auth::User();
	$user = User::find($request->id);
    $user->password = Hash::make($request->pass);
    $user->name =$request->name;
    $user->save();

    return redirect()->back()->with('success', '¡Contraseña actualizada correctamente!');
	}
}
