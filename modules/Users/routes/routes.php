<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Users\src\Http\Controllers\UsersController;
 use Modules\Auth\src\Models\User;

 Route::middleware(['web','users.middleware'])->prefix('/admin/users')->name('admin.users.')->group(function(){
     Route::get('/', [UsersController::class, 'index'])->name('index')->can('view',User::class);
     Route::post('/store', [UsersController::class, 'store'])->name('store');
     Route::get('/add', [UsersController::class, 'create'])->name('add')->can('create',User::class); 
     Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('edit')->can('edit',User::class);
     Route::post('/update', [UsersController::class, 'update'])->name('update');
     Route::post('/update-info', [UsersController::class, 'updateInfo'])->name('update-info');
     Route::get('/delete/{id}', [UsersController::class, 'destroy'])->name('delete')->can('delete',User::class);
     Route::post('/delete-all', [UsersController::class, 'deleteAll'])->name('delete-all');
 });

