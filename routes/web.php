<?php

use App\Models\Tutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StudentDashboardController;


Route::get('/', function () {
    return view('homepage');
});

Route::get('/home', [HomeController::class, 'index']); //this Route will take each user  to the required page.



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Parent Routes , everything related to the parent...
Route::middleware('auth')->name('Parent.')->group(function () {
    Route::controller(ChildrenController::class)->group(function () {

        //show all childs
        Route::get('child', 'index')->name('getchilds');
        //add new child
        Route::get('childs', 'create')->name('addchild');
        Route::post('childs', 'store')->name('storechild');
        //delete child's account
        Route::get('childrem/{id}', 'destroy')->name('child_remove');
        //edit child's account
        Route::get('childedi/{id}', 'edit')->name('editchild');
        Route::post('childedi/{id}', 'update')->name('updatechild');
        //chating
        Route::get('childch', 'chat')->name('chat');
        //display all available tutors
        Route::get('alltutors', 'display_tutors')->name('display_tutors');
        //display a specific tutor info
        Route::get('tutorinfo/{id}', 'tutor_info')->name('tutor_info');
        //hire a new tutor
        Route::post('hirenew/{id}', 'hire_a_tutor')->name('hire_a_tutor');
        //unhire a tutor
        Route::get('unhire/{id}', 'unhire_a_tutor')->name('unhire_a_tutor');
        //display all hired tutors
        Route::get('hiredtutors/{id}', 'already_hired')->name('hired_tutors');
        //Progress report
        Route::get('child-report', 'viewReports')->name('viewReports');
        //Buy Books
        Route::get('buy-books', 'buyBooks')->name('buyBooks');
        //View Wallet
        Route::get('view-wallet', 'viewWallet')->name('viewWallet');
        //Issue Feedback
        Route::get('issue-feedback', 'issueFeedback')->name('issueFeedback');

    });


    //show parent's books
    Route::get('getbooks', [BookController::class, 'show_parent_books'])->name('parentbook');
    //Add book to the cart
    Route::get('AddToCart',[BookController::class,'AddToCart'])->name('addtocart');
    //view Purchased books
    Route::get('purchased-books', [BookController::class, 'show_parent_books'])->name('purchasedBooks');

    //Post Issue Feedback
    Route::post('send-feedback/{type}', [ServicesController::class, 'store'])->name('sendFeedback');
    // Buy Book
    Route::get('confirm-purchase/{book}', [BookController::class, 'confirmPurchase'])->name('confirmPurchase');
});

//Admin Routes , everything related to the Admin
Route::middleware('auth')->name('Admin.')->group(function () {
    //table of users acounts.
    Route::get('usersacc/{type}', [AdminController::class, 'users_accounts'])->name('usersaccounts');
    //display user feedback
    Route::get('display-feedback', [AdminController::class, 'displayFeedback'])->name('displayFeedback');
    //delete user feedback
    Route::delete('delete-feedback/{id}', [ServicesController::class, 'destroy'])->name('destroyFeedback');
    //add Book page
    Route::get('add-Book', [AdminController::class, 'addBook'])->name('addBook');
    // add book post
    Route::post('add-book-post', [BookController::class, 'store'])->name('postBook');
});


// //Child Routes ,everything related to the child...
// Route::middlware('auth')->group(function(){
// //go to child's dashboard

// });

//Tutor Routes , everything related to the tutor
Route::middleware('auth')->name('Tutor.')->group(function () {
    Route::get('updatepfp', [TutorController::class, function () {
        return view('tutors.update_pfp');
    }])->name('updateinterface');
    //update the profile pic
    Route::put('updatepfp', [ProfileController::class, 'update_pfp'])->name('updatepfp');
    //remove the profile pic
    Route::put('removepfp', [TutorController::class, 'remove_pfp'])->name('removepfp');
    //get tutor's chat with a parent
    Route::get('chating', [TutorController::class, 'chating'])->name('chating');
    //get all children that the tutor teaches
    Route::get('get_students', [TutorController::class, 'get_students'])->name('get_students');
    //check a specific child's progress
    Route::get('student_progress/{id}', [TutorController::class, 'student_progress'])->name('student_progress');
});

//Student Dashboard Controllers

Route::middleware('auth')->group(function () {
    Route::get('/child-profile/{id}', [StudentDashboardController::class, 'getProfile'])->name('getProfile');
    Route::get('child-book/{id}', [StudentDashboardController::class, 'getBooks'])->name('getBooks');
    Route::get('progress-report/{id}', [StudentDashboardController::class, 'viewReport'])->name('viewReport');
    Route::get('lesson_page/{subject}/{child}', [StudentDashboardController::class, 'subject_page'])->name('subject_page');
    Route::post('incrementProgress/{child_id}/{role}', [StudentDashboardController::class, 'increase_progress'])->name('incrementProgress');
    Route::get('student_logout', [ChildrenController::class, 'index'])->name('student_logout');
    Route::get('child/{id}', [StudentDashboardController::class,'child_interface'])->name('child_interface');
});

Route::get('under_construction', function () {
    return view('underconstruction');
})->name('under_construction');

require __DIR__ . '/auth.php';
