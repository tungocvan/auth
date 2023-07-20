<?php 
 use Modules\nameModule\src\Models\nameModule;
 use Illuminate\Support\Facades\Route;
 use Modules\nameModule\src\Http\Controllers\nameModuleController;
 Route::middleware(['web','routeName.middleware','auth'])->prefix('/admin/routeName')->name('admin.routeName.')->group(function(){
     Route::get('/', [nameModuleController::class, 'index'])->name('index')->can('view',nameModule::class);
     Route::get('/add', [nameModuleController::class, 'create'])->name('add')->can('create',nameModule::class);
     Route::get('/edit/{id}', [nameModuleController::class, 'edit'])->name('edit')->can('edit',nameModule::class);
     Route::get('/delete/{id}', [nameModuleController::class, 'destroy'])->name('delete')->can('delete',nameModule::class);
 });