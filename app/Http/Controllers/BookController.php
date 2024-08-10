<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Parents;
use App\Models\BookCart;
use App\Models\ParentBook;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Get all books that the parent purchased
     * @param none
     * @return \Illuminate\Contracts\View\View|Parents
     */
    public function show_parent_books()
    {
        $parent_books = Parents::where('id', Auth::id())->with('books')->first();
        $purchased_books = $parent_books->books;

        return view('Parent.purchased-books', compact('purchased_books'));
    }

    /**
     * Add new book to the books table
     * @param BookRequest $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
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
        session()->flash('success', 'Book added successfuly');

        return redirect()->back();
    }

    /**
     * Send the cart after adding books to it(buy the books)
     * @param Book 
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function confirmPurchase()
    {
        $empty = collect(Auth::user()->user_cart->booksInCart)->isEmpty();
        if ($empty) {
            return redirect()->back()->withErrors('Cart is empty')->withInput();
        }
        foreach (Auth::user()->user_cart->booksInCart as $book) {
            ParentBook::create([
                'parent_id' => Auth::user()->id,
                'book_id' => $book->book_id,
            ]);
            Auth::user()->user_cart->booksInCart->where('book_id', $book->book_id)->first()->delete();
        }
        Auth::user()->user_cart->total = 0.0;
        Auth::user()->user_cart->save();
        session()->flash('success', 'Books purchased successfuly ');
        return redirect()->back();
    }

    /**
     * Add the desired book to the cart
     * @param Book
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function AddToCart($id)
    {
        $exists = BookCart::where('book_id', $id)->where('cart_id', Auth::user()->user_cart->id)->exists();

        if (
            Auth::user()->user_cart->booksInCart->where('book_id', $id)->first() ||
            Auth::user()->user_type->books->where('book_id', $id)->first()
        ) {
            return redirect()->back()->withErrors('Book already added to cart or purchased')->withInput();
        }

        $book = BookCart::create([
            'book_id' => $id,
            'cart_id' => Auth::user()->user_cart->id,
        ]);
        $book->load('books');
        Auth::user()->user_cart->total += $book->books->where('id', $id)->first()->price;
        Auth::user()->user_cart->save();
        session()->flash('success', 'Book added to cart');

        return redirect()->back();
    }

    /**
     * Remove a book from the authenticated user's cart
     * @param Book
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function removeFromCart($id)
    {
        Auth::user()->user_cart->total -= Auth::user()->user_cart->cart_books->where('id', $id)->first()->price;
        Auth::user()->user_cart->booksInCart->where('book_id', $id)->first()->delete();
        Auth::user()->user_cart->save();
        session()->flash('success', 'Book removed from cart');

        return redirect()->back();
    }
    /**
     * Display the authenticated user's cart
     * @param none
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function UserCart()
    {
        return view('parent.my_cart');
    }

    /**
     * Remove all books from the authenticated user's cart
     * @param none
     *@return mixed|\Illuminate\Http\RedirectResponse
     */
    public function clearCart() {
        $empty = collect(Auth::user()->user_cart->booksInCart)->isEmpty();
        if ($empty) {
            return redirect()->back()->withErrors('Cart is already empty')->withInput();
        }
        foreach (Auth::user()->user_cart->booksInCart as $book) {           
            Auth::user()->user_cart->booksInCart->where('book_id', $book->book_id)->first()->delete();
        }
        Auth::user()->user_cart->total = 0.0;
        Auth::user()->user_cart->save();
        session()->flash('success', 'Cart cleared successfuly ');
        return redirect()->back();
    }
}
