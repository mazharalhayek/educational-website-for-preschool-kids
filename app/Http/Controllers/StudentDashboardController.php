<?php

namespace App\Http\Controllers;

use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Response;

  /**
     * Update the specified resource in storage.
     *
     * 
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */

class StudentDashboardController extends Controller
{
    public function getProfile($id)
{
    // Assuming you have a method like findChildById in your Child model
    $child = Children::find($id); // Replace 1 with the actual child ID you want to display

    if (!$child) {
        abort(404); // Show a 404 error if the child is not found
    }
    return view('Children.child-profile', ['child' => $child]);
}

public function getBooks($id) {
    $child = Children::find($id);
    return view('Children.books-main', ['child' => $child]);
}
public function viewReport($id) {
    $child = Children::find($id);
    return view('Children.progress-report', ['child' => $child]);
}
};
