<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarPage;
use App\Http\Controllers\RequestorPage;
use App\Http\Controllers\RedirectUser;
use App\Http\Controllers\AdminPages;



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
    if(auth()->user()){
        return redirect()->route('redirect');
    }else{
        return redirect('/login');

    }
});


Route::group(['middleware'=>[
    'auth:sanctum',
    'verified',
    'admin',
]],function(){

    Route::get('/admin/dashboard',[AdminPages::class,'dashboard'])->name('admin-dashboard');
    Route::get('/admin/user',[AdminPages::class,'users'])->name('admin-user');
    Route::get('/admin/documents',[AdminPages::class,'documents'])->name('admin-document');
    // Route::get('/admin/campus',[AdminPages::class,'campus'])->name('admin-campus');

});



Route::group(['middleware'=>[
    'auth:sanctum',
    'verified',
    'registrar',
]],function(){

    Route::get('/registrar/dashboard', [RegistrarPage::class, 'dashboard'])->name('registrar-dashboard');
    Route::get('/registrar/request', [RegistrarPage::class, 'request'])->name('registrar-request');
    Route::get('/registrar/document', [RegistrarPage::class, 'document'])->name('registrar-document');
    Route::get('/registrar/request/details/{id}', [RegistrarPage::class, 'requestdetails'])->name('registrar-request.details');
    Route::get('/registrar/graduate/requests', [RegistrarPage::class, 'graduated'])->name('registrar-graduated');
    Route::get('/registrar/request/graduate/details/{id}', [RegistrarPage::class, 'graduatedDetails'])->name('registrar-graduatedDetails');
    // Route::get('/registrar/request/other-settings', [RegistrarPage::class, 'payment'])->name('registrar-payment.info');
     Route::get('/registrar/view/request/{id}', [RegistrarPage::class, 'viewRequest'])->name('registrar-view.request');
     Route::get('/registrar/view/requestor/{id}', [RegistrarPage::class, 'viewrequestor'])->name('registrar-view.requestor');
});

Route::group(['middleware'=>[
    'auth:sanctum',
    'verified',
    'requestor',
]],function(){

    Route::get('/requestor/dashboard', [RequestorPage::class, 'dashboard'])->name('requestor-dashboard');
    Route::get('/requestor/request', [RequestorPage::class, 'request'])->name('requestor-request');
    Route::get('/requestor/information', [RequestorPage::class, 'information'])->name('requestor-information'); 
    Route::get('/requestor/update-information', [RequestorPage::class, 'updateinformation'])->name('requestor-update-information');
    Route::get('/requestor/information', [RequestorPage::class, 'information'])->name('requestor-information');
    Route::get('/requestor/request/details/{id}', [RequestorPage::class, 'viewrequest'])->name('requestor-viewrequest');

});




Route::get('/redirect',[RedirectUser::class,'index'])->name('redirect');

Route::get('/payment/linkbiz/tutorial',function(){
        return view('pages.tutorial');
})->name('tutorial');

Route::get('/email',function(){
    return view('emails.email');
})->name('email');