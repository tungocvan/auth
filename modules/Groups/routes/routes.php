<?php 

 use Modules\Groups\src\Models\Groups;
 use Illuminate\Support\Facades\Route;
 use Modules\Groups\src\Http\Controllers\GroupsController;
 Route::middleware(['web','groups.middleware'])->prefix('/admin/groups')->name('admin.groups.')->group(function(){
     Route::get('/', [GroupsController::class, 'index'])->name('index')->can('viewAny',Groups::class);
     Route::get('/add', [GroupsController::class, 'create'])->name('add')->can('create',Groups::class);
     Route::post('/update', [GroupsController::class, 'update'])->name('update');
     Route::get('/edit/{group}', [GroupsController::class, 'edit'])->name('edit')->can('edit',Groups::class);     
     Route::get('/delete/{id}', [GroupsController::class, 'destroy'])->name('delete')->can('delete',Groups::class);     
     Route::get('/permission/{group}', [GroupsController::class, 'permission'])->name('permission')->can('permission',Groups::class); 
     Route::post('/permission/{group}', [GroupsController::class, 'postPermission']);
 });

  