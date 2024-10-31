<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\AjustesController;
use App\Http\Controllers\CocedorController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\ProductoresController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\TrasladoController;
use App\Http\Controllers\ClientesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('/layouts/master');
}); */
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('usuarios', [App\Http\Controllers\HomeController::class, 'usuarios'])->name('usuarios');
Route::post('updateuser', [App\Http\Controllers\HomeController::class, 'updtuser'])->name('updateuser');
Route::get('sistema', [App\Http\Controllers\HomeController::class, 'info'])->name('sistema');
Route::post('updatepass', [App\Http\Controllers\HomeController::class, 'updatepass'])->name('updatepass');

Route::get('recepcion', [RecepcionController::class, 'index'])->name('recepcion');
Route::get('newrecepcion', [RecepcionController::class, 'create'])->name('newrecepcion');
Route::post('saverecepcion', [RecepcionController::class, 'store'])->name('saverecepcion');
Route::post('filtrorecolector', [RecepcionController::class, 'listarecolector'])->name('filtrorecolector');
Route::post('filtroproductor', [RecepcionController::class, 'listarproductor'])->name('filtroproductor');
Route::post('filtrotanque', [RecepcionController::class, 'filtrotanque'])->name('filtrotanque');
Route::post('filtrotanque2', [RecepcionController::class, 'filtrotanque2'])->name('filtrotanque2');
Route::get('showrecoleccion/{id}', [RecepcionController::class, 'show'])->name('showrecoleccion');
Route::get('anularrecoleccion', [RecepcionController::class, 'anular'])->name('anularrecoleccion');
Route::post('laboratorio', [RecepcionController::class, 'lab'])->name('laboratorio');
//articulos
Route::get('articulos', [ArticuloController::class, 'index'])->name('articulos');
Route::get('newarticulos', [ArticuloController::class, 'create'])->name('newarticulos');
Route::post('savearticulos', [ArticuloController::class, 'store'])->name('savearticulos');
Route::get('editarticulos/{id}', [ArticuloController::class, 'edit'])->name('editarticulos');
Route::post('updatearticulos', [ArticuloController::class, 'update'])->name('updatearticulos');
Route::get('showarticulos/{id}', [ArticuloController::class, 'show'])->name('showarticulos');
Route::post('pasartobo', [ArticuloController::class, 'pasartobo'])->name('pasartobo');
//clientes
Route::get('clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('newcliente', [ClientesController::class, 'create'])->name('newcliente');
Route::post('validarcliente', [ClientesController::class, 'validar'])->name('validarcliente');
Route::get('showmov/{id}', [ClientesController::class, 'show'])->name('showmov');
Route::post('savecliente', [ClientesController::class, 'store'])->name('savecliente');
Route::get('editcliente/{id}', [ClientesController::class, 'edit'])->name('editcliente');
Route::post('updatecliente', [ClientesController::class, 'update'])->name('updatecliente');
Route::post('control', [ClientesController::class, 'controltobos'])->name('control');
//ajustes
Route::get('ajustes', [AjustesController::class, 'index'])->name('ajustes');
Route::get('newajuste', [AjustesController::class, 'create'])->name('newajuste');
Route::get('showajuste/{id}', [AjustesController::class, 'show'])->name('showajuste');
Route::post('saveajuste', [AjustesController::class, 'store'])->name('saveajuste');
//recoectores
Route::get('cocedores', [CocedorController::class, 'index'])->name('cocedores');
Route::get('newcocedor', [CocedorController::class, 'create'])->name('newcocedor');
Route::get('editcocedor/{id}', [CocedorController::class, 'edit'])->name('editcocedor');
Route::post('updatecocedor', [CocedorController::class, 'update'])->name('updatecocedor');
Route::post('savecocedor', [CocedorController::class, 'store'])->name('savecocedor');
//producccion
Route::get('produccion', [ProduccionController::class, 'index'])->name('produccion');
Route::get('newproduccion', [ProduccionController::class, 'create'])->name('newproduccion');
Route::get('editproduccion/{id}', [ProduccionController::class, 'edit'])->name('editproduccion');
Route::post('updateproduccion', [ProduccionController::class, 'update'])->name('updateproduccion');
Route::get('showproduccion/{id}', [ProduccionController::class, 'show'])->name('showproduccion');
Route::post('saveproduccion', [ProduccionController::class, 'store'])->name('saveproduccion');
Route::post('filtroturno', [ProduccionController::class, 'listarturno'])->name('filtroturno');
Route::post('closeproduccion', [ProduccionController::class, 'closeproduccion'])->name('closeproduccion');
//deposito
Route::get('deposito', [DepositoController::class, 'index'])->name('deposito');
Route::get('newdeposito', [DepositoController::class, 'create'])->name('newdeposito');
Route::get('editdeposito/{id}', [DepositoController::class, 'edit'])->name('editdeposito');
Route::post('updatedeposito', [DepositoController::class, 'update'])->name('updatedeposito');
Route::post('savedeposito', [DepositoController::class, 'store'])->name('savedeposito');
Route::get('showdeposito', [DepositoController::class, 'show'])->name('showdeposito');
//traslado
Route::get('traslado', [TrasladoController::class, 'index'])->name('traslado');
Route::get('newtraslado', [TrasladoController::class, 'create'])->name('newtraslado');
Route::post('filtrainventario', [TrasladoController::class, 'filtrainventario'])->name('filtrainventario');
Route::post('savetraslado', [TrasladoController::class, 'store'])->name('savetraslado');
Route::get('showtraslado/{id}', [TrasladoController::class, 'show'])->name('showtraslado');
//entregas
Route::get('entrega', [EntregaController::class, 'index'])->name('entrega');
Route::get('newentrega', [EntregaController::class, 'create'])->name('newentrega');
Route::post('saveentrega', [EntregaController::class, 'store'])->name('saveentrega');
Route::get('showentrega/{id}', [EntregaController::class, 'show'])->name('showentrega');
Route::get('anularventa', [EntregaController::class, 'anular'])->name('anularventa');
Route::post('almacenacliente', [EntregaController::class, 'almacena'])->name('almacenacliente');
//reporte
Route::get('analisis', [ReportesController::class, 'analisis'])->name('analisis');
Route::get('report-cocedor', [ReportesController::class, 'reportcocedor'])->name('report-cocedor');
Route::get('report-clientes', [ReportesController::class, 'reporteclientes'])->name('report-clientes');
Route::get('report-ventas', [ReportesController::class, 'reportventas'])->name('report-ventas');
Route::get('report-ventascliente', [ReportesController::class, 'reportventascliente'])->name('report-ventascliente');
Route::get('report-produccion', [ReportesController::class, 'reportproduccion'])->name('report-produccion');
Route::get('report-inventario', [ReportesController::class, 'inventario'])->name('report-inventario');
Route::get('report-inventariofecha', [ReportesController::class, 'inventariofecha'])->name('report-inventariofecha');










