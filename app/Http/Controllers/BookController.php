<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    // List all books
   
   public function index(Request $request)
{
    $query = Book::with('reviews')->latest(); // eager load reviews and order by latest

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('author')) {
        $query->where('author', 'like', '%' . $request->author . '%');
    }

    if ($request->filled('genre')) {
        $query->where('genre', 'like', '%' . $request->genre . '%');
    }

    $books = $query->paginate(10)->withQueryString(); // keep search values in pagination links

    return view('books.index', compact('books'));
}



    // Show a single book
    public function show(Book $book)
    {
       $reviews = $book->reviews()->with('user')->latest()->get();
    return view('books.show', compact('book', 'reviews'));
    }
   
    // Admin: Show form to create a new book
    public function create()
    {
        return view('books.create');
    }

    // Admin: Store new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'publication_year' => 'nullable|integer',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

       $data['user_id'] = Auth::id(); // Add this to $data

Book::create($data);

return redirect()->route('books.index')->with('success', 'Book added successfully.');
       
    }

    // Admin: Edit form
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Admin: Update book
    public function update(Request $request, Book $book)
    {
        $data = $request->all();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    // Admin: Delete book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

}
