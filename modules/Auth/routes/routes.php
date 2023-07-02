<?php 

 use Modules\Auth\src\Http\Controllers\Auth\LoginController;
 use Modules\Auth\src\Http\Controllers\Auth\RegisterController;
 use Illuminate\Support\Facades\Route; 
 use Laravel\Socialite\Facades\Socialite;

 Auth::routes([
  "register" => true
 ]);
 Route::middleware(['web'])->prefix('/')->group(function(){
      Route::middleware(['auth.middleware','auth'])->get('/home', function()
      {
          return view('Auth::home');
      })->name('home'); 

      Route::get('/auth/google', function () {
        return Socialite::driver('google')->redirect();
      })->name('auth.google');
    
     Route::get('/auth/google/callback', [LoginController::class, 'googleCallback']);

     Route::get('/auth/facebook', function () {
        return Socialite::driver('facebook')->redirect();
    })->name('auth.facebook');
    
     Route::get('/auth/facebook/callback', [LoginController::class, 'facebookCallback']);

 });