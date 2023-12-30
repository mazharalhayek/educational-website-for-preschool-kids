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
        $parent_books = ParentBook::where('parent_id', auth()->user()->id)->get();
        foreach ($parent_books as $item)
        {

            $purchased=Book::where('id', $item->book_id)->get(); 
        }
        
        return view('Parent.purchased-books', compact('purchased'));
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
    public function confirmPurchase(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $parent = Auth::user();

    // Add the book to the parent's collection
    ParentBook::create([
        'parent_id' => $parent->id,
        'book_id' => $book->id,
    ]);
    
    return redirect()->back(); 
}
}
