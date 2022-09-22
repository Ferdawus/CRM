<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ReferController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SLAController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SMSController;
use App\Http\Controllers\UserController;
use App\Models\Domain;
use Egulias\EmailValidator\Parser\CommentStrategy\DomainComment;
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
Route::get('/user/edit/{id}', [RegisteredUserController::class, 'edit']);
Route::post('/user/update', [RegisteredUserController::class, 'update']);
Route::get('/user/status/{id}/{status}', [RegisteredUserController::class, 'update_status']);
Route::resource('user',RegisteredUserController::class);

/*
|--------------------------------------------------------------------------
| User Roles Routes
|--------------------------------------------------------------------------
*/
Route::get('/roles/edit/{id}', [RoleController::class, 'edit']);
Route::get('/roles/{id}/delete', [RoleController::class, 'destroy']);
Route::post('/roles/update', [RoleController::class, 'update']);
Route::post('/role/asign',[RoleController::class,'RoleAsignStore']);
Route::resource('roles',RoleController::class);

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::get('/client/detail/{id}',[ClientController::class,'ClientDetail']);
Route::get('/client/per-service/{id}/delete',[ClientController::class,'ClientServiceDelete']);
// --------------------------------------------------------------------------
Route::get('/client/show/{id}', [ClientController::class, 'show']);
Route::get('/client/edit/{id}', [ClientController::class, 'edit']);
Route::post('/client/update',[ClientController::class,'update']);
Route::get('/client/{id}/delete', [ClientController::class, 'destroy']);
Route::get('/client/information/{id}',[ClientController::class,'ClientInformation']);
Route::get('/client/get-service-by-client/{client_id}/{product_id}',[ClientController::class,'getServiceByClient']);
Route::resource('client',ClientController::class);

/*
|--------------------------------------------------------------------------
| RefrredBy Routes
|--------------------------------------------------------------------------
*/
Route::get('/refer/{id}/delete', [ReferController::class, 'destroy']);
Route::get('/refer/edit/{id}',[ReferController::class,'edit']);
Route::post('/refer/update',[ReferController::class,'update']);
Route::resource('refer',ReferController::class);
/*
|--------------------------------------------------------------------------
| Product Type Routes
|--------------------------------------------------------------------------
*/
Route::get('/product/type/{id}/delete', [ProductTypeController::class, 'destroy']);
Route::get('/product/type/edit/{id}', [ProductTypeController::class, 'edit']);
Route::post('/product/type/update', [ProductTypeController::class, 'update']);
Route::resource('/product/type',ProductTypeController::class);
/*
|--------------------------------------------------------------------------
|Domain Routes
|--------------------------------------------------------------------------
*/
Route::get('/domain/{id}/delete', [DomainController::class, 'destroy']);
Route::get('/domain/edit/{id}',[DomainController::class,'edit']);
Route::post('/domain/update',[DomainController::class,'update']);
Route::resource('/domain',DomainController::class);
/*
|--------------------------------------------------------------------------
|SLA Routes
|--------------------------------------------------------------------------
*/
Route::get('/sla/service/{id}/delete', [SLAController::class, 'destroy']);
Route::get('/sla/service/edit/{id}', [SLAController::class, 'edit']);
Route::post('/sla/service/update', [SLAController::class, 'update']);
Route::resource('/sla/service',SLAController::class);
/*
|--------------------------------------------------------------------------
|HostedBy Routes
|--------------------------------------------------------------------------
*/

Route::get('/host/{id}/delete', [HostController::class, 'destroy']);
Route::get('/host/edit/{id}',[HostController::class,'edit']);
Route::post('/host/update',[HostController::class,'update']);
Route::resource('/host',HostController::class);
/*
|--------------------------------------------------------------------------
|Service Client Routes
|--------------------------------------------------------------------------
*/
Route::get('/service/client/product/{id}', [ServiceController::class,'ClientServiceShow']);
Route::post('/service/client/product/update', [ServiceController::class,'ClientServiceUpdate']);
Route::post('/service/insert/{ClientId}', [ServiceController::class,'store']);

Route::get('/client/per-service/{ClientId}', [ServiceController::class,'getServicesByClientId']);

/*
|--------------------------------------------------------------------------
|Invioce Routes
|--------------------------------------------------------------------------
*/
Route::get('/invoice/{id}/delete',[InvoiceController::class,'destroy']);
Route::get('/invoice/template/{id}',[InvoiceController::class,'template']);
Route::get('/invoice/invoice_per_transaction/{id}',[InvoiceController::class,'getTransaction_per_invoice']);
Route::get('/invoice/invoice_per_transaction/delete/{id}',[InvoiceController::class,'getTransaction_per_invoice_delete']);
Route::get('/invoice/receipt/{id}',[InvoiceController::class,'receipt']);
Route::get('/invoice/pdf/generate/', [InvoiceController::class, 'generatePDF'])->name('pdf.generate');
Route::get('/invoice/pop_payment/show/{id}',[InvoiceController::class, 'paymentPopShow']);
Route::post('/invoice/transaction/update',[InvoiceController::class, 'transactionUpdate']);
Route::resource('/invoice',InvoiceController::class);

/*
|--------------------------------------------------------------------------
|All Service Routes
|--------------------------------------------------------------------------
*/
Route::resource('/service',ServiceController::class);
/*
|--------------------------------------------------------------------------
|All Report Routes
|--------------------------------------------------------------------------
*/
Route::resource('/report/client',ReportController::class);
/*
|--------------------------------------------------------------------------
|All Report Routes
|--------------------------------------------------------------------------
*/
Route::resource('/sms',SMSController::class);


require __DIR__.'/auth.php';
