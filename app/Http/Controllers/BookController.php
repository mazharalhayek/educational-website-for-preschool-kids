<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ParentBook;
use App\Models\Parents;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    public function show_parent_books()
    {
        $parent_books = Parents::where('id',Auth::id())->with('books')->first();
        $purchased_books = $parent_books->books;

        return view('Parent.purchased-books', compact('purchased_books'));
    }
    public function store(BookRequest $request)
    {
        // Validate the request
        $validatedData = $request->validated();

        // Handle cover image upload
        $coverPath = $request->file('Cover')->store('covers', 'public');
        $validatedData['Cover'] = $coverPath;

        // Handle PDF upload
        $pdfPath = $request->file('PDF')->store('pdfs', 'public');
        $validatedData['PDF'] = $pdfPath;

        // Save book data to the database
        Book::create($validatedData);

        return redirect()->back();
    }
    public function confirmPurchase($id)
{
    $book = Book::findOrFail($id);
    $existing = ParentBook::where('parent_id',Auth::id())->where('book_id',$id)->first();

    if($existing)
    {
        return redirect()->back()->with('alert','This book is already purchased!.');
    }

    ParentBook::create([
        'parent_id' => Auth::user()->id,
        'book_id' => $book->id,
    ]);

    return redirect()->back();
}
}
