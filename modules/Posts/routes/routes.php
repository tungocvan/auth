<?php 

 use Modules\Posts\src\Models\Posts;
 use Illuminate\Support\Facades\Route;
 use  App\Policies;
 use Modules\Posts\src\Http\Controllers\PostsController;
 Route::middleware(['web','posts.middleware','auth'])->prefix('/admin/posts')->name('admin.posts.')->group(function(){
     Route::get('/', [PostsController::class, 'index'])->name('index')->can('viewAny',Posts::class);
     Route::get('/add', [PostsController::class, 'create'])->name('add')->can('createPost',Posts::class);
     Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('edit')->can('editPost',Posts::class);
     Route::get('/delete/{id}', [PostsController::class, 'destroy'])->name('delete')->can('deletePost',Posts::class);
 });