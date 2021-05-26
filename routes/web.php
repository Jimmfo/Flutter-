<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IronController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\TurntableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformationController;
use App\Models\Camera;
use App\Models\Fan;
use App\Models\iron;
use App\Models\Turntable;
use App\Models\Information;



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


Route::get('/turntables/import', [TurntableController::class, 'import'])->name('/turntables/import');
Route::post('/turntables/importData', [TurntableController::class, 'importData'])->name('/turntables/importData');
Route::get('/irons/import', [IronController::class, 'import'])->name('/irons/import');
Route::post('/irons/importData', [IronController::class, 'importData'])->name('/irons/importData');

Route::get('/fans/import', [FanController::class, 'import'])->name('/fans/import');
Route::post('/fans/importData', [FanController::class, 'importData'])->name('/fans/importData');
Route::get('/cameras/import', [CameraController::class, 'import'])->name('/cameras/import');
Route::post('/cameras/importData', [CameraController::class, 'importData'])->name('/cameras/importData');
Route::get('/turntables/exportToXlsx', [TurntableController::class, 'exportToXlsx'])->name('/turntables/exportToXlsx');
Route::get('/irons/exportToXlsx', [IronController::class, 'exportToXlsx'])->name('/irons/exportToXlsx');
Route::get('/fans/exportToXlsx', [FanController::class, 'exportToXlsx'])->name('/fans/exportToXlsx');
Route::get('/cameras/exportToXlsx', [CameraController::class, 'exportToXlsx'])->name('/cameras/exportToXlsx');
Route::get('/turntables/cards', [TurntableController::class, 'cards'])->name('/turntables/cards');
Route::get('/turntables/chart', [TurntableController::class, 'chart'])->name('/cameras/chart');
Route::get('/irons/cards', [IronController::class, 'cards'])->name('/irons/cards');
Route::get('/irons/chart', [IronController::class, 'chart'])->name('/irons/chart');
Route::get('/fans/cards', [FanController::class, 'cards'])->name('/fans/cards');
Route::get('/fans/chart', [FanController::class, 'chart'])->name('/fans/chart');
Route::get('/cameras/cards', [CameraController::class, 'cards'])->name('/cameras/cards');
Route::get('/cameras/chart', [CameraController::class, 'chart'])->name('/cameras/chart');
Route::get('/exportFanstoCSV',[FanController::class,'exportFanstoCSV'])->name('/exportFanstoCSV');

Route::get('/exportCamerastoCSV' ,[CameraController::class,'exportCamerastoCSV'])->name('/exportCamerastoCSV');
Route::get('/exportIronstoCSV',[IronController::class,'exportIronstoCSV'])->name('/exportIronstoCSV');
Route::get('/exportturntablestoCSV',[TurntableController::class,'exportturntablestoCSV'])->name('/exportturntablestoCSV');

Route::get('/', function () {
    $cameras=Camera::all()->take(1);
    $fans=Fan::all()->take(1);
    $irons=iron::all()->take(1);
    $information=information::all();
    $turntables=Turntable::all()->take(1);
    return view('welcome')
   ->with('cameras',$cameras)
   ->with('fans',$fans)
   ->with('irons',$irons)
   ->with('turntables',$turntables)
   ->with('information',$information);


});



Route::resources([
'irons'=>IronController::class,
'cameras'=>CameraController::class,
'fans'=>FanController::class,
'turntables'=>TurntableController::class,
'user'=> UserController::class,
'information'=>InformationController::class,

]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');