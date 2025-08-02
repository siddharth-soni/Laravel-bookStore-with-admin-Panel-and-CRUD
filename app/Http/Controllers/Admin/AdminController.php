<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Category;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }
    
    public function dashboard()
    {
        $totalBooks = Book::count();
        $availableBooks = Book::where('availability', true)->count();
        $totalCategories = Category::count();
        $recentBooks = Book::with('category')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalBooks', 'availableBooks', 'totalCategories', 'recentBooks'
        ));
    }
}
