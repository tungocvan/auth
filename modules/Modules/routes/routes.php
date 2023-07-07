<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Modules\src\Http\Controllers\ModulesController;
 Route::middleware(['web','modules.middleware'])->prefix('/modules')->group(function(){
     Route::get('/', [ModulesController::class, 'index']);
 });