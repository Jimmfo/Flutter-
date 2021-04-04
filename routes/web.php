<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IronController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\TurntableController;
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

Route::get('/exportFanstoCSV',[FanController::class,'exportFanstoCSV'])->name('/exportFanstoCSV');
Route::get('/exportCamerastoCSV' ,[CameraController::class,'exportCamerastoCSV'])->name('/exportCamerastoCSV');
Route::get('/exportIronstoCSV',[IronController::class,'exportIronstoCSV'])->name('/exportIronstoCSV');
Route::get('/exportturntablestoCSV',[TurntableController::class,'exportturntablestoCSV'])->name('/exportturntablestoCSV');
Route::get('/', function () {
    return view('welcome');
});

Route::resources([
'irons'=>IronController::class,
'cameras'=>CameraController::class,
'fans'=>FanController::class,
'turntables'=>TurntableController::class,
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
