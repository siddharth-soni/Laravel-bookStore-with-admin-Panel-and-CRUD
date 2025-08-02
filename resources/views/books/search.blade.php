@extends('layouts.app')

@section('title', 'Search Results - Online Book Store')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Search Results for "{{ $query }}"</h1>
    
    @if($books->count() > 0)
        <p class="text-muted mb-4">Found {{ $books->total() }} result{{ $books->total() > 1 ? 's' : '' }}</p>
        
        <!-- Books Grid -->
        <div class="row">
            @foreach($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $book->category->name }}</span>
                        <h5 class="card-title">{{ Str::limit($book->title, 40) }}</h5>
                        <p class="text-muted mb-2">by {{ $book->author }}</p>
                        <p class="card-text small">{{ Str::limit($book->description, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="h6 text-primary mb-0">${{ $book->price }}</span>
                            @if($book->availability)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary w-100 btn-sm">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        @if($books->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $books->appends(['q' => $query])->links() }}
        </div>
        @endif
    @else
        <div class="text-center py-5">
            <i class="bi bi-search display-1 text-muted"></i>
            <h3 class="mt-3">No books found</h3>
            <p class="text-muted">We couldn't find any books matching "{{ $query }}"</p>
            <div class="mt-4">
                <a href="{{ route('books.index') }}" class="btn btn-primary me-2">Browse All Books</a>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">Back to Home</a>
            </div>
        </div>
    @endif
</div>
@endsection
