<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SLAController;
use App\Http\Controllers\UserController;
use App\Models\Domain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/user/{id}/delete', [RegisteredUserController::class, 'destroy']);

Route::resource('user',RegisteredUserController::class);

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::get('/client/detail/{id}',[ClientController::class,'ClientDetail']);
Route::get('/client/show/{id}', [ClientController::class, 'show']);
Route::get('/client/edit/{id}', [ClientController::class, 'edit']);
Route::post('/client/update',[ClientController::class,'update']);
Route::get('/client/{id}/delete', [ClientController::class, 'destroy']);
Route::resource('client',ClientController::class);

/*
|--------------------------------------------------------------------------
| RefrredBy Routes
|--------------------------------------------------------------------------
*/
Route::get('/refer/{id}/delete', [ReferController::class, 'destroy']);
Route::resource('refer',ReferController::class);
/*
|--------------------------------------------------------------------------
| Product Type Routes
|--------------------------------------------------------------------------
*/
Route::get('/product/type/{id}/delete', [ProductTypeController::class, 'destroy']);
Route::resource('/product/type',ProductTypeController::class);
/*
|--------------------------------------------------------------------------
|Domain Routes
|--------------------------------------------------------------------------
*/
Route::get('/domain/{id}/delete', [DomainController::class, 'destroy']);
Route::resource('/domain',DomainController::class);
/*
|--------------------------------------------------------------------------
|SLA Routes
|--------------------------------------------------------------------------
*/
Route::get('/sla/service/{id}/delete', [SLAController::class, 'destroy']);
Route::resource('/sla/service',SLAController::class);
/*
|--------------------------------------------------------------------------
|HostedBy Routes
|--------------------------------------------------------------------------
*/
Route::get('/host/{id}/delete', [HostController::class, 'destroy']);
Route::resource('/host',HostController::class);
/*
|--------------------------------------------------------------------------
|Service Routes
|--------------------------------------------------------------------------
*/
Route::get('/service/client/product/{id}', [ServiceController::class,'ClientServiceShow']);
Route::post('/service/insert/{ClientId}', [ServiceController::class,'store']);






require __DIR__.'/auth.php';