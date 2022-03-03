<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
/*
 * Con parametro obligatorios
Route::get('/param/{id}/{user}',function($id,$user){
    return 'El id és '. $id . ' i usuari és ' . $user;
});

Parametros opcionales
Route::get('/paramOpcional/{id?}/{user?}',function($id=null,$user=null){
    if ($id===null){
        return "Id no especificat!!";
    }
    if ($user===null){
        return "User no especificat!!";
    }
    return 'El id és '. $id . ' i usuari és ' . $user;
});*/

Route::group(['prefix' => 'empresa'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'empresesShow'])->name('empresesShow');

    Route::get('/add',[App\Http\Controllers\HomeController::class, 'loadAddEmpresaView'])->name('loadAddEmpresaView');
    Route::post('/add',[App\Http\Controllers\HomeController::class, 'addEmpresa'])->name('addEmpresa');


    Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'editEmpresa'])->name('editEmpresa');
    Route::post('/editEmpresa', [App\Http\Controllers\HomeController::class, 'submitEmpresaEdit'])->name('submitEmpresaEdit');

    Route::group(['prefix' => 'oferta'], function () {
        Route::get('/', function (){
            return 'PAgina empresa/oferta';
        });
        Route::get('/add/{idempresa}',function($idempresa){
            return 'El id empresa és ' . $idempresa;
        });
        Route::get('/edit/{idoferta}',function($idoferta){
            return 'El id oferta és ' . $idoferta;
        });
        Route::get('/enviar', function (){
            return 'PAgina empresa/oferta/enviar';
        });
    });
});

Route::get('/fitxa', [App\Http\Controllers\HomeController::class, 'editUserProfile'])->name('editUserProfile');
Route::post('/actualizarFitxa', [App\Http\Controllers\HomeController::class, 'updateUserProfile'])->name('updateUserProfile');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/estudis/add', function (){
    return 'return estudis add';
});
