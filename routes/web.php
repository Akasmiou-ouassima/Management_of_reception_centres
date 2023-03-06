<?php

use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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
    return view('signin');
})->name('log');

Route::post('/',[LoginController::class,'login'])->name('login');




// Route::resource('beneficiaires', BeneficiaireController::class);
// Route::resource('centres', CentreController::class);
// Route::resource('services', ServiceController::class);

Route::middleware('auth:admin')->group( function() {


Route::get('/logoutAdmin', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');

Route::resource('admins', AdminController::class);
Route::get('admins/liste/{id}',[AdminController::class,'liste'])->name('admins.liste');
Route::get('admins/AjoutBene/{id}',[AdminController::class,'AjoutBene'])->name('admins.AjoutBene');
Route::get('admins/indexBene/{id}',[AdminController::class,'indexBene'])->name('admins.indexBene');
Route::post('admins/storeBene',[AdminController::class,'storeBene'])->name('admins.storeBene');
Route::GET('admins/editBene/{id}',[AdminController::class,'editBene'])->name('admins.editBene');
Route::PUT('admins/updateBene/{id}',[AdminController::class,'updateBene'])->name('admins.updateBene');
Route::DELETE('admins/SoftDeleteBene/{id}',[AdminController::class,'SoftDeleteBene'])->name('admins.SoftDeleteBene');
Route::get('admins/SoftDeleteDataBene/{id}',[AdminController::class,'archiveBene'])->name('admins.archiveBene');
Route::DELETE('admins/destroyBene/{id}',[AdminController::class,'destroyBene'])->name('admins.destroyBene');
Route::get('admins/restoreBene/{id}',[AdminController::class,'restoreBene'])->name('admins.restoreBene');



Route::get('admins/AjoutSer/{id}',[AdminController::class,'AjoutSer'])->name('admins.AjoutSer');
Route::post('admins/storeSer',[AdminController::class,'storeSer'])->name('admins.storeSer');
Route::get('admins/indexSer/{id}',[AdminController::class,'indexSer'])->name('admins.indexSer');
Route::GET('admins/editSer/{id}',[AdminController::class,'editSer'])->name('admins.editSer');
Route::PUT('admins/updateSer/{id}',[AdminController::class,'updateSer'])->name('admins.updateSer');
Route::DELETE('admins/SoftDeleteSer/{id}',[AdminController::class,'SoftDeleteSer'])->name('admins.SoftDeleteSer');
Route::get('admins/SoftDeleteDataSer/{id}',[AdminController::class,'archiveSer'])->name('admins.archiveSer');
Route::DELETE('admins/destroySer/{id}',[AdminController::class,'destroySer'])->name('admins.destroySer');
Route::get('admins/restoreSer/{id}',[AdminController::class,'restoreSer'])->name('admins.restoreSer');


Route::get('admins/AjoutUser/{id}',[AdminController::class,'AjoutUser'])->name('admins.AjoutUser');
Route::post('admins/storeUser',[AdminController::class,'storeUser'])->name('admins.storeUser');
Route::get('admins/indexUser/{id}',[AdminController::class,'indexUser'])->name('admins.indexUser');
Route::GET('admins/editUser/{id}',[AdminController::class,'editUser'])->name('admins.editUser');
Route::PUT('admins/updateUser/{id}',[AdminController::class,'updateUser'])->name('admins.updateUser');
Route::DELETE('admins/SoftDeleteUser/{id}',[AdminController::class,'SoftDeleteUser'])->name('admins.SoftDeleteUser');
Route::get('admins/SoftDeleteDataUser/{id}',[AdminController::class,'archiveUser'])->name('admins.archiveUser');
Route::DELETE('admins/destroyUser/{id}',[AdminController::class,'destroyUser'])->name('admins.destroyUser');
Route::get('admins/restoreUser/{id}',[AdminController::class,'restoreUser'])->name('admins.restoreUser');



Route::post('admins/AjoutCentre',[AdminController::class,'AjoutCentre'])->name('admins.AjoutCentre');
Route::post('admins/storeCentre',[AdminController::class,'storeCentre'])->name('admins.storeCentre');
Route::GET('admins/editCentre/{id}',[AdminController::class,'editCentre'])->name('admins.editCentre');
Route::PUT('admins/updateCentre/{id}',[AdminController::class,'updateCentre'])->name('admins.updateCentre');
Route::DELETE('admins/SoftDeleteCentre/{id}',[AdminController::class,'SoftDeleteCentre'])->name('admins.SoftDeleteCentre');
Route::post('admins/SoftDeleteDataCentre',[AdminController::class,'archiveCentre'])->name('admins.archiveCentre');
Route::DELETE('admins/destroyCentre/{id}',[AdminController::class,'destroyCentre'])->name('admins.destroyCentre');
Route::get('admins/restoreCentre/{id}',[AdminController::class,'restoreCentre'])->name('admins.restoreCentre');

});

   

Route::middleware('auth')->group( function() {


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
   
Route::resource('users', UserController::class);
Route::get('users/liste/{id}',[UserController::class,'liste'])->name('userss.liste');
Route::get('users/AjoutBene/{id}',[UserController::class,'AjoutBene'])->name('userss.AjoutBene');
Route::get('users/indexBene/{id}',[UserController::class,'indexBene'])->name('userss.indexBene');
Route::post('users/storeBene',[UserController::class,'storeBene'])->name('userss.storeBene');
Route::GET('users/editBene/{id}',[UserController::class,'editBene'])->name('userss.editBene');
Route::PUT('users/updateBene/{id}',[UserController::class,'updateBene'])->name('userss.updateBene');
Route::get('users/SoftDeleteDataBene/{id}',[UserController::class,'archiveBene'])->name('userss.archiveBene');



Route::get('users/AjoutSer/{id}',[UserController::class,'AjoutSer'])->name('userss.AjoutSer');
Route::post('users/storeSer',[UserController::class,'storeSer'])->name('userss.storeSer');
Route::get('users/indexSer/{id}',[UserController::class,'indexSer'])->name('userss.indexSer');
Route::GET('users/editSer/{id}',[UserController::class,'editSer'])->name('userss.editSer');
Route::PUT('users/updateSer/{id}',[UserController::class,'updateSer'])->name('userss.updateSer');
Route::DELETE('users/SoftDeleteSer/{id}',[UserController::class,'SoftDeleteSer'])->name('userss.SoftDeleteSer');
Route::get('users/SoftDeleteDataSer/{id}',[UserController::class,'archiveSer'])->name('userss.archiveSer');
Route::get('users/restoreSer/{id}',[UserController::class,'restoreSer'])->name('userss.restoreSer');


Route::GET('users/editCentre/{id}',[UserController::class,'editCentre'])->name('userss.editCentre');
Route::PUT('users/updateCentre/{id}',[UserController::class,'updateCentre'])->name('userss.updateCentre');

});