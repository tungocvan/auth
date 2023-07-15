<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Groups\src\Http\Controllers\GroupsController;
 Route::middleware(['web','groups.middleware'])->prefix('/admin/groups')->name('admin.groups.')->group(function(){
     Route::get('/', [GroupsController::class, 'index'])->name('index');
     Route::get('/add', [GroupsController::class, 'create'])->name('add');
     Route::post('/update', [GroupsController::class, 'update'])->name('update');
     Route::get('/edit/{group}', [GroupsController::class, 'edit'])->name('edit');     
     Route::get('/delete/{id}', [GroupsController::class, 'destroy'])->name('delete');     
     Route::get('/permission/{group}', [GroupsController::class, 'permission'])->name('permission');
     Route::post('/permission/{group}', [GroupsController::class, 'postPermission']);
 });

