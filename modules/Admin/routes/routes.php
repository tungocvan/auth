<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Admin\src\Http\Controllers\AdminController;
 Route::middleware(['web','admin.middleware'])->prefix('/admin')->name('admin.')->group(function(){
     Route::get('/', [AdminController::class, 'index'])->name('index');     
     Route::get('/add', [AdminController::class, 'create'])->name('add');
     Route::get('/edit', [AdminController::class, 'edit'])->name('edit');
     
 }); 