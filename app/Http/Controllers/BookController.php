<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::with('category');
        
        // Filter by category if provided
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        // Filter by availability if provided
        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }
        
        $books = $query->paginate(12);
        $categories = Category::all();
        
        return view('books.index', compact('books', 'categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $book->load('category');
        
        // Get related books from same category
        $relatedBooks = Book::where('category_id', $book->category_id)
            ->where('id', '!=', $book->id)
            ->where('availability', true)
            ->take(4)
            ->get();
        
        return view('books.show', compact('book', 'relatedBooks'));
    }
    
    /**
     * Search for books
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        
        if (empty($query)) {
            return redirect()->route('books.index');
        }
        
        $books = Book::with('category')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(12);
        
        return view('books.search', compact('books', 'query'));
    }
}
