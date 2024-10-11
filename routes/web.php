<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/',[AppController::class,'form'])->name('app.form');
Route::post('/connection',[AppController::class,'connecter'])->name('app.connecter');

Route::middleware(['auth'])->group(function () {
    Route::get('/depart',[AppController::class,'acceuil'])->name('app.courierD');
    Route::get('/arrive',[AppController::class,'courierA'])->name('app.courierA');
    Route::get('/contact',[AppController::class,'contact'])->name('app.contact');
    Route::post('/ajouterD',[AppController::class,'Add_D'])->name('app.add_D');
    Route::post('/ajouterA',[AppController::class,'Add_A'])->name('app.add_A');
    Route::post('/ajouterC',[AppController::class,'Add_C'])->name('app.add_C');
    Route::get('/deleteD/{p}',[AppController::class,'delete'])->name('app.delete_D');
    Route::get('/deleteA/{p}',[AppController::class,'delete_A'])->name('app.delete_A');
    Route::get('/deleteC/{p}',[AppController::class,'delete_C'])->name('app.delete_C');
    Route::get('/edit/{p}',[AppController::class,'edit_D'])->name('app.edit_D');
    Route::get('/editA/{p}',[AppController::class,'edit_A'])->name('app.edit_A');
    Route::get('/editC/{p}',[AppController::class,'edit_C'])->name('app.edit_C');
    Route::post('/update',[AppController::class,'update_D'])->name('app.update_D');
    Route::post('/updateA',[AppController::class,'update_A'])->name('app.update_A');
    Route::post('/updateC/{p}',[AppController::class,'update_C'])->name('app.update_C');
    Route::get('/search',[AppController::class,'search']);
    Route::get('/searchA',[AppController::class,'search_A'])->name('app.search_A');
    Route::get('/searchC',[AppController::class,'search_C'])->name('app.search_C');
    Route::get('/logout',[AppController::class,'Deconnecter'])->name('app.logout');
});











