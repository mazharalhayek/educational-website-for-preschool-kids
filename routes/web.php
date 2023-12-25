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

//Parent Routes , everything related to the parent...
Route::middleware('auth')->name('Parent.')->group(function(){
Route::get('child/{id}',[ChildrenController::class,'child_interface'])->name('child_interface');
//show all childs
Route::get('child',[ChildrenController::class,'index'])->name('getchilds');
//add new child
Route::get('childs',[ChildrenController::class,'create'])->name('addchild');
Route::post('childs',[ChildrenController::class,'store'])->name('storechild');
//delete child's account
Route::get('childrem/{id}',[ChildrenController::class,'destroy'])->name('child_remove');
//edit child's account
Route::get('childedi/{id}',[ChildrenController::class,'edit'])->name('editchild');
Route::post('childedi/{id}',[ChildrenController::class,'update'])->name('updatechild');
//chating
Route::get('childch',[ChildrenController::class,'chat'])->name('chat');
});

// //Child Routes ,everything related to the child...
// Route::middlware('auth')->group(function(){
// //go to child's dashboard

// });

// //Tutor Routes , everything related to the tutor
// Route::middlware('auth')->group(function(){

// });

require __DIR__.'/auth.php';
