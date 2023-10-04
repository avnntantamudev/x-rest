<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaCotroller;
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\FuncionarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|produte.cadastrar admin.categoriaStore
*/

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('/index', [HomeController::class, 'index'])->name('home.index'); 
Route::post('/login', [UserCotroller::class, 'auth'])->name('login'); 
Route::get('/logout', [UserCotroller::class, 'logout'])->name('logout');

//Routas do Administrador
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.home');
Route::get('/admin/stock', [AdminController::class, 'stock'])->name('admin.stock');
Route::get('/admin/venda', [AdminController::class, 'venda'])->name('admin.venda');
Route::put('/admin/vender/{id}', [AdminController::class, 'vender'])->where('id','[0-9]+')->name('admin.vender');

Route::get('/admin/produto', [AdminController::class, 'produtoCadastrar'])->name('produte.cadastrar');
Route::get('/admin/categoria', [AdminController::class, 'categoriaCadastrar'])->name('categoria.cadastrar');
Route::get('/admin/Usuarios', [AdminController::class, 'usuario'])->name('admin.usuario');
Route::post('/admin/categoria', [CategoriaCotroller::class, 'store'])->name('admin.categoriaStore');
Route::delete('/admin/categoria/{id}', [CategoriaCotroller::class, 'destroy'])->where('id','[0-9]+')->name('categoria.destroy');
Route::post('/admin/usuarios', [UserCotroller::class, 'store'])->name('store.users'); 

//Routas do funcionario  
Route::get('/funcionario/index', [FuncionarioController::class, 'index'])->name('funcionario.home');
Route::get('/funcionario/cliente', [FuncionarioController::class, 'cliente'])->name('funcionario.cliente');
Route::get('/funcionario/documento', [FuncionarioController::class, 'documento'])->name('funcionario.documento');
Route::get('/funcionario/artigo', [FuncionarioController::class, 'artigo'])->name('funcionario.artigo');
Route::get('/funcionario/factura', [FuncionarioController::class, 'factura'])->name('funcionario.facturas');
Route::get('/funcionario/cliente/listar', [FuncionarioController::class, 'clienteListar'])->name('funcionario.cliente.listar');
Route::post('/funcionario/cliente', [FuncionarioController::class, 'clienteStore'])->name('funcionario.cliente.store');
Route::get('/funcionario/pesquisar/cliente', [FuncionarioController::class, 'pesquisarCliente'])->name('funcionario.pesquisar.cliente');
Route::get('/funcionario/pesquisar/PDF', [FuncionarioController::class, 'gerarPDF'])->name('funcionario.gerarPDF');
Route::get('/funcionario/editar/cliente/{id}', [FuncionarioController::class, 'editarCliente'])->where('id','[0-9]+')->name('funcionario.cliente.editar');
Route::put('/funcionario/update/cliente/{id}', [FuncionarioController::class, 'updateCliente'])->where('id','[0-9]+')->name('funcionario.cliente.update');
Route::post('/funcionario/select', [FuncionarioController::class, 'select'])->name('funcionario.select');
Route::post('/funcionario/familia', [FuncionarioController::class, 'familiaStore'])->name('funcionario.familia.store');
Route::post('/funcionario/artigo/salvar', [FuncionarioController::class, 'artigoStore'])->name('funcionario.artigo.store');
Route::post('/funcionario/artigo/finalizarVenda', [FuncionarioController::class, 'finalizarCompra'])->name('funcionario.finalizarCompra');
Route::post('/funcionario/finalizarVenda/pdf', [FuncionarioController::class, 'finalizarComprapdf'])->name('funcionario.finalizarComprapdf');
Route::post('/funcionario/faturaVenda/pdf', [FuncionarioController::class, 'facturaDeVendaPDF'])->name('funcionario.faturaVendapdf');
Route::get('/funcionario/imprimir/venda/{id}', [FuncionarioController::class, 'facturaDeVendaPDF'])->where('id','[0-9]+')->name('funcionario.venda.pdf');
