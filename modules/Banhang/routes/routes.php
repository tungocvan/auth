<?php 
 use Modules\Banhang\src\Models\Banhang;
 use Illuminate\Support\Facades\Route;
 use Modules\Banhang\src\Http\Controllers\BanhangController;
 Route::middleware(['web','banhang.middleware','auth'])->prefix('/admin/banhang')->name('admin.banhang.')->group(function(){
     Route::get('/', [BanhangController::class, 'index'])->name('index')->can('view',Banhang::class);
     Route::get('/add', [BanhangController::class, 'create'])->name('add')->can('create',Banhang::class);
     Route::get('/edit/{id}', [BanhangController::class, 'edit'])->name('edit')->can('edit',Banhang::class);
     Route::get('/delete/{id}', [BanhangController::class, 'destroy'])->name('delete')->can('delete',Banhang::class);
 });