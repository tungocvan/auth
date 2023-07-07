<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Dashboard\src\Http\Controllers\DashboardController;
 Route::middleware(['web','dashboard.middleware'])->prefix('/admin/dashboard')->name('admin.dashboard.')->group(function(){
     Route::get('/', [DashboardController::class, 'index'])->name('index');
 });

