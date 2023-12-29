<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\BookController;


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
//show parent's books
Route::get('getbooks',[BookController::class,'show_parent_books'])->name('parentbook');
//display all available tutors
Route::get('alltutors',[ChildrenController::class,'display_tutors'])->name('display_tutors');
//display a specific tutor info
Route::get('tutorinfo/{id}',[ChildrenController::class,'tutor_info'])->name('tutor_info');
//hire a new tutor
Route::post('hirenew/{id}',[ChildrenController::class,'hire_a_tutor'])->name('hire_a_tutor');
//display all hired tutors
Route::get('hiredtutors',[ChildrenController::class,'already_hired'])->name('hired_tutors');
});

//Admin Routes , everything related to the Admin
Route::middleware('auth')->name('Admin.')->group(function(){
//table of users acounts.
Route::get('usersacc/{type}',[AdminController::class,'users_accounts'])->name('usersaccounts');

});

// //Child Routes ,everything related to the child...
// Route::middlware('auth')->group(function(){
// //go to child's dashboard

// });

// //Tutor Routes , everything related to the tutor
// Route::middlware('auth')->group(function(){

// });

require __DIR__.'/auth.php';
