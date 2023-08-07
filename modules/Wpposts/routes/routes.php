<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Wpposts\src\Http\Controllers\api\WppostsController;
 Route::middleware(['api','wpposts.middleware'])->prefix('/api/wpposts')->name('api.wpposts.')->group(function(){
     Route::get('/', [WppostsController::class, 'index'])->name('index');
 });