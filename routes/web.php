<?php

use App\Http\Controllers\MouvementStockController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});

Route::resource('produits', ProduitController::class);
Route::resource('clients', ClientController::class);
Route::resource('mouvementStocks', MouvementStockController::class);
Route::resource('ventes', VenteController::class);
