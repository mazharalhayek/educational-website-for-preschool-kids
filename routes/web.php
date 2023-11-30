<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChildrenController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/home',[HomeController::class,'index']);//this Route will take each user  to the required page.



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Children Routes
Route::middleware('auth')->group(function(){
//show all childs
Route::get('child',[ChildrenController::class,'index'])->name('getchilds');
//add new child
Route::get('childs',[ChildrenController::class,'create'])->name('addchild');
Route::post('childs',[ChildrenController::class,'store'])->name('storechild');
//go to child's dashboard
Route::get('child/{id}',[ChildrenController::class,'child_interface'])->name('child_interface');

});


require __DIR__.'/auth.php';