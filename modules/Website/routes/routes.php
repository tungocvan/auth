<?php 
 use Modules\Website\src\Models\Website;
 use Illuminate\Support\Facades\Route;
 use Modules\Website\src\Http\Controllers\WebsiteController;
 Route::middleware(['web','website.middleware','auth'])->prefix('/admin/website')->name('admin.website.')->group(function(){
     Route::get('/', [WebsiteController::class, 'index'])->name('index')->can('view',Website::class);
     Route::get('/add', [WebsiteController::class, 'create'])->name('add')->can('create',Website::class);
     Route::get('/edit/{id}', [WebsiteController::class, 'edit'])->name('edit')->can('edit',Website::class);
     Route::get('/delete/{id}', [WebsiteController::class, 'destroy'])->name('delete')->can('delete',Website::class);
 });