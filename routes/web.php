<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportationEcontroller;
use App\Http\Controllers\MouvementStockController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['web', 'verified', 'auth'])->group(function () {

   Route::get('/dashboard', [DashboardController::class, 'index'])
     ->middleware(['auth'])
     ->name('dashboard');

    route::resource('ventes',VenteController::class);
    route::resource('clients',ClientController::class);
    route::resource('produits',ProduitController::class);
    route::resource('/mouvementStocks',MouvementStockController::class);
    route::resource('/permissions',PermissionController::class);
    route::resource('/roles',RoleController::class);
    route::resource('/users',UserContoller::class);
    Route::POST('/ventes/{vente}/annuler', [VenteController::class, 'annulerVente'])->name('ventes.annuler');
    Route::post('/simple-exel/expot', [ExportationEcontroller::class,'exportation'] )->name('export');
});




require __DIR__.'/auth.php';

?>
