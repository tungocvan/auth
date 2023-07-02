<?php 
 use Illuminate\Support\Facades\Route;
 use Modules\Posts\src\Http\Controllers\PostsController;
 Route::middleware(['web','posts.middleware','auth'])->prefix('/admin/posts')->name('admin.posts.')->group(function(){
     Route::get('/', [PostsController::class, 'index'])->name('index');
     Route::get('/add', [PostsController::class, 'create'])->name('create');
     Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('edit');
 });