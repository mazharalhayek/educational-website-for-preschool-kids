<?php

use App\Models\Tutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\StudentDashboardController;


Route::get('/', function () {
    $tutors = Tutor::inRandomOrder()->take(3)->get();
    return view('homepage', compact('tutors'));
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
        Route::get('childch/{id}/{tid?}', 'chat')->name('chat');
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
        //Give a parent a review
        Route::post('ReviewTutor/{id}/{cid}', 'tutorReview')->name('TutorReview');

    });


    //show parent's books
    Route::get('getbooks', [BookController::class, 'show_parent_books'])->name('parentbook');
    //check user's cart
    Route::get('getcart', [BookController::class, 'UserCart'])->name('GetCart');
    //Add book to the cart
    Route::get('AddToCart/{bookid}', [BookController::class, 'AddToCart'])->name('addtocart');
    //Remove book from cart
    Route::get('RemoveFromCart/{bookid}', [BookController::class, 'removeFromCart'])->name('removefromcart');
    //view Purchased books
    Route::get('purchased-books', [BookController::class, 'show_parent_books'])->name('purchasedBooks');
    //Clear cart
    Route::get('Clear_cart', [BookController::class, 'clearCart'])->name('clearcart');

    //Post Issue Feedback
    Route::post('send-feedback/{type}', [ServicesController::class, 'store'])->name('sendFeedback');
    // Buy Book
    Route::get('confirm-purchase', [BookController::class, 'confirmPurchase'])->name('confirmPurchase');
    //give a book a review
    Route::post('Review/{id}', [BookController::class, 'Review'])->name('review');
});

//Admin Routes , everything related to the Admin
Route::middleware('auth')->name('Admin.')->group(function () {
    //table of users acounts.
    Route::get('usersacc/{type}', [AdminController::class, 'users_accounts'])->name('usersaccounts');
    //display user feedback
    Route::get('display-feedback/{type}', [AdminController::class, 'displayFeedback'])->name('displayFeedback');
    //delete user feedback
    Route::delete('delete-feedback/{id}', [ServicesController::class, 'destroy'])->name('destroyFeedback');
    //add Book page
    Route::get('add-Book', [AdminController::class, 'addBook'])->name('addBook');
    // add book post
    Route::post('add-book-post', [BookController::class, 'store'])->name('postBook');
    //ban a user
    Route::get('Ban/{id}', [AdminController::class, 'BanUser'])->name('userBan');
    //manage sent media requests
    Route::get('mediaManage', [AdminController::class, 'manageMedia'])->name('media');
    //Acept or reject sent media
    Route::get('AorR/{id}/{state}', [AdminController::class, 'mediaState'])->name('AccOrRej');
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
    Route::get('chating/{id}/{pid?}', [TutorController::class, 'chating'])->name('chating');
    //delete a message
    Route::get('demessage/{id}', [ChatController::class, 'del_message'])->name('deleteMessage');
    //Edit a message
    Route::post('edmessage/{id}', [ChatController::class, 'edi_message'])->name('editMessage');
    //get all children that the tutor teaches
    Route::get('get_students', [TutorController::class, 'get_students'])->name('get_students');
    //check a specific child's progress
    Route::get('student_progress/{id}', [TutorController::class, 'student_progress'])->name('student_progress');
    //Send a media file to a student
    Route::post('mediaFile/{id}', [TutorController::class, 'sendFile'])->name('sendMedia');
    //Get schedule
    Route::get('MySchedule', [TutorController::class, 'Schedule'])->name('getSched');
});

//Student Dashboard Controllers

Route::middleware('auth')->group(function () {
    Route::get('/child-profile/{id}', [StudentDashboardController::class, 'getProfile'])->name('getProfile');
    Route::get('child-book/{id}', [StudentDashboardController::class, 'getBooks'])->name('getBooks');
    Route::get('progress-report/{id}', [StudentDashboardController::class, 'viewReport'])->name('viewReport');
    Route::get('lesson_page/{subject}/{child}', [StudentDashboardController::class, 'subject_page'])->name('subject_page');
    Route::post('incrementProgress/{child_id}/{role}', [StudentDashboardController::class, 'increase_progress'])->name('incrementProgress');
    Route::get('student_logout', [ChildrenController::class, 'index'])->name('student_logout');
    Route::get('child/{id}', [StudentDashboardController::class, 'child_interface'])->name('child_interface');
    //Send message
    Route::post('sendmessage/{id}', [ChatController::class, 'sendMessage'])->name('sendMessage');
    //Get chat
    Route::get('getchat/{id}', [ChatController::class, 'getChat'])->name('getMessages');
    //Report message
    Route::get('reportmes/{id}', [ChatController::class, 'reportMessage'])->name('reportMessage');
    //Clear chat
    Route::get('clearch/{id}', [ChatController::class, 'ClearChat'])->name('deleteAllMessages');
    //Unreport a message
    Route::get('unreport/{id}', [ChatController::class, 'unreport'])->name('UnreportMessage');
    //Get sent media by tutor
    Route::get('myMedia/{id}', [StudentDashboardController::class, 'getRecivedMedia'])->name('MyMedia');

});

Route::get('under_construction', function () {
    return view('calendar');
})->name('under_construction');

require __DIR__ . '/auth.php';
