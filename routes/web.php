<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubidoController;
use App\Http\Controllers\Image;


Route::get("/", [SubidoController::class ,"index"])->name("subido.index");

Route::resource("subido", SubidoController::class);

Route::get("/img/{id}", [Image::class ,"index"])->name("subido.image");
