<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ParentBook;
use App\Models\Parents;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function show_parent_books()
    {
        $parent_books = ParentBook::where('parent_id',Auth::id())->with('book')->get();
        return view('my_books',compact(['parent_books']));
    }
}
