<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Users\src\Http\Controllers\UsersController;
 Route::middleware(['web','users.middleware'])->prefix('/admin/users')->name('admin.users.')->group(function(){
     Route::get('/', [UsersController::class, 'index'])->name('index');
    // Route::post('/', [UsersController::class, 'index'])->name('index');
     Route::get('/add', [UsersController::class, 'create'])->name('add');
     Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('edit');
     Route::get('/delete/{id}', [UsersController::class, 'destroy'])->name('delete');
 });

