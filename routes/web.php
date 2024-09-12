<?php

use App\Http\Controllers\Login\LoginForm;
use App\Http\Controllers\Menu\MenuDesplegableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\AreaController;

use App\Http\Controllers\FacultadController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RolMenuPrincipalController;

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\Login\AuthenticateController;

//general

Route::get('login',[LoginForm::class,'index']);
Route::get('logout',[LoginForm::class,'logout']);
Route::post('authenticate',[AuthenticateController::class,'authenticate']);

//aplicando ajax



    Route::middleware(['verifysession'])->group(function () {
        Route::get('/', function () {
            return view('layout5');
        });
        Route::resource('universidades', UniversidadController::class);
        Route::resource('areas', AreaController::class);
        Route::resource('configuraciones', ConfiguracionController::class);
        Route::resource('facultades', FacultadController::class);
        Route::resource('modulos', ModuloController::class);
        Route::resource('menus_principales', MenuPrincipalController::class);
        Route::resource('menus', MenuController::class);
        Route::resource('roles', RolController::class);
        Route::resource('roles_menus_principales', RolMenuPrincipalController::class);
        Route::resource('menusdesplegables', MenuDesplegableController::class);
    });
