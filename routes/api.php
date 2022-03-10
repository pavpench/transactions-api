<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WalletController;


//Public routes
// Route::resource("products", ProductController::class);
Route::get("/products", [ProductController::class, "index"]);
Route::get("/products/{id}", [ProductController::class, "show"]);
Route::get("/products/search/{name}",[ProductController::class,"search"]);
Route::post("/register", [AuthController::class,"register"]);
Route::post("/login", [AuthController::class,"login"]);

//Wallet routes
Route::post("/createwallet", [WalletController::class, "createWallet"]);

//Protected routes

Route::group(["middleware"=>["auth:sanctum"]], function(){
    Route::post("/products", [ProductController::class,"store"]);
    Route::put("/products/{id}", [ProductController::class,"update"]);
    Route::delete("/products/{id}", [ProductController::class,"destroy"]);
    Route::post("/logout", [AuthController::class,"logout"]);
    //Protected Wallet routes
    Route::get("/wallet/{userId}",[WalletController::class, "getWalletAmount"]);
    Route::put("/wallet/{userId}",[WalletController::class,"addFunds"]);

});