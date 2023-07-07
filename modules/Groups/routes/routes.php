<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Groups\src\Http\Controllers\GroupsController;
 Route::middleware(['web','groups.middleware'])->prefix('/admin/groups')->name('admin.groups.')->group(function(){
     Route::get('/', [GroupsController::class, 'index'])->name('index');
     Route::get('/add', [GroupsController::class, 'create'])->name('add');
 });

