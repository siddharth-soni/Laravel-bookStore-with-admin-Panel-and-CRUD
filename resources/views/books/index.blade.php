@extends('layouts.app')

@section('title', 'All Books - Show Books')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">All Books</h1>
    
    <!-- Filters -->
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="GET" class="d-flex flex-wrap gap-3 align-items-end">
                <div class="flex-grow-1">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-grow-1">
                    <label for="availability" class="form-label">Availability</label>
                    <select name="availability" id="availability" class="form-select">
                        <option value="">All Books</option>
                        <option value="1" {{ request('availability') == '1' ? 'selected' : '' }}>Available</option>
                        <option value="0" {{ request('availability') == '0' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Books Grid -->
    <div class="row">
        @forelse($books as $book)
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
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-book display-1 text-muted"></i>
                <h3 class="mt-3">No books found</h3>
                <p class="text-muted">Try adjusting your search criteria.</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">View All Books</a>
            </div>
        </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($books->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $books->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection
