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
    //GET
    Route::get('/', [App\Http\Controllers\HomeController::class, 'empresesShow'])->name('empresesShow');

    //ADD
    Route::get('/add',[App\Http\Controllers\HomeController::class, 'loadAddEmpresaView'])->name('loadAddEmpresaView');
    Route::post('/add',[App\Http\Controllers\HomeController::class, 'addEmpresa'])->name('addEmpresa');

    //EDIT
    Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'editEmpresa'])->name('editEmpresa');
    Route::post('/editEmpresa', [App\Http\Controllers\HomeController::class, 'submitEmpresaEdit'])->name('submitEmpresaEdit');


    Route::group(['prefix' => 'oferta'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'ofertesShow'])->name('ofertesShow');
        Route::get('/add/{idempresa}',function($idempresa){
            return 'El id empresa és ' . $idempresa;
        });
        Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'editOferta'])->name('editOferta');
        Route::post('/editOferta', [App\Http\Controllers\HomeController::class, 'submitOfertaEdit'])->name('submitOfertaEdit');

        Route::get('/enviar', [App\Http\Controllers\HomeController::class, 'enviarOferta'])->name('enviarOferta');
    });
});

Route::group(['prefix' => 'estudi'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'estudisShow'])->name('estudisShow');

    Route::get('/add',[App\Http\Controllers\HomeController::class, 'loadAddEstudiView'])->name('loadAddEstudiView');
    Route::post('/add',[App\Http\Controllers\HomeController::class, 'addEstudi'])->name('addEstudi');

    Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'editEstudi'])->name('editEstudi');
    Route::post('/editEstudi', [App\Http\Controllers\HomeController::class, 'submitEstudiEdit'])->name('submitEstudiEdit');

});

Route::group(['prefix' => 'fitxa'], function () {
    Route::get('/', [App\Http\Controllers\FitxaController::class, 'editUserProfile'])->name('editUserProfile');
    Route::post('/', [App\Http\Controllers\FitxaController::class, 'updateUserProfile'])->name('updateUserProfile');

    Route::get('/estudis',[App\Http\Controllers\FitxaController::class, 'userStudies'])->name('userStudies');

    Route::get('/estudis/addTitulo',[App\Http\Controllers\FitxaController::class, 'addStudyView'])->name('addStudyView');
    Route::post('/estudis/addTitulo',[App\Http\Controllers\FitxaController::class, 'addUserStudy'])->name('addUserStudy');
});
/**
Route::get('/fitxa', [App\Http\Controllers\HomeController::class, 'editUserProfile'])->name('editUserProfile');
Route::post('/actualizarFitxa', [App\Http\Controllers\HomeController::class, 'updateUserProfile'])->name('updateUserProfile');
**/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
