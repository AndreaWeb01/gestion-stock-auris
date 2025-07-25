<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportationEcontroller;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\MouvementStockController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    Route::resource('ventes', VenteController::class)->only('create','store','index','show');
    Route::post('/simple-exel/expot', [ExportationEcontroller::class,'exportation'] )->name('export');
    Route::get('clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('clients', [ClientController::class, 'create'])->name('clients.create');
    Route::resource('clients', ClientController::class)->except('destroy');
    Route::get('produits', [ProduitController::class, 'index'])->name('produits.index');
    Route::get('mouvementStocks', [MouvementStockController::class, 'index'])->name('mouvementStocks.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['web', 'verified', 'auth','is.admin'])->group(function () {
    Route::get('/ventes/{vente}',[VenteController::class,'edit'])->name('ventes.edit');
    Route::put('/ventes',[VenteController::class,'update'])->name('ventes.update');
    Route::delete('/ventes/{vente}',[VenteController::class,'destroy'])->name('ventes.destroy');
    Route::POST('/ventes/{vente}/annuler', [VenteController::class, 'annulerVente'])->name('ventes.annuler');
    Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
    route::resource('produits',ProduitController::class)->except('index');
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('users', UserContoller::class);
    Route::resource('mouvementStocks', MouvementStockController::class)->except('index');
    Route::get('/horaires', [HoraireController::class, 'index'])->name('admin.horaires.index');
    Route::get('/horaires/edit', [HoraireController::class, 'edit'])->name('admin.horaires.edit');
    Route::post('/horaires', [HoraireController::class, 'update'])->name('admin.horaires.update');
});





require __DIR__.'/auth.php';

?>
