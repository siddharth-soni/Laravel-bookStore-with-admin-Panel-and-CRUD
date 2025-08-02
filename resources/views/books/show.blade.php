@extends('layouts.app')

@section('title', $book->title . ' - Online Book Store')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
            <li class="breadcrumb-item active">{{ $book->title }}</li>
        </ol>
    </nav>

    <!-- Book Details -->
    <div class="row mb-5">
        <div class="col-md-4 mb-4">
            <!-- Book Cover Placeholder -->
            <div class="card">
                <div class="card-body text-center" style="height: 400px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <div>
                        <i class="bi bi-book display-1"></i>
                        <h5 class="mt-3">{{ $book->title }}</h5>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="mb-3">
                <span class="badge bg-secondary fs-6">{{ $book->category->name }}</span>
                @if($book->availability)
                    <span class="badge bg-success fs-6 ms-2">Available</span>
                @else
                    <span class="badge bg-danger fs-6 ms-2">Out of Stock</span>
                @endif
            </div>
            
            <h1 class="display-5 mb-3">{{ $book->title }}</h1>
            <h4 class="text-muted mb-4">by {{ $book->author }}</h4>
            
            <div class="mb-4">
                <span class="display-6 text-primary fw-bold">${{ $book->price }}</span>
            </div>
            
            @if($book->description)
            <div class="mb-4">
                <h5>Description</h5>
                <p class="lead">{{ $book->description }}</p>
            </div>
            @endif
            
            <div class="row mb-4">
                <div class="col-sm-6">
                    <strong>Category:</strong> {{ $book->category->name }}
                </div>
                <div class="col-sm-6">
                    <strong>Price:</strong> ${{ $book->price }}
                </div>
                <div class="col-sm-6 mt-2">
                    <strong>Author:</strong> {{ $book->author }}
                </div>
                <div class="col-sm-6 mt-2">
                    <strong>Status:</strong> 
                    @if($book->availability)
                        <span class="text-success">Available</span>
                    @else
                        <span class="text-danger">Out of Stock</span>
                    @endif
                </div>
            </div>
            
            <div class="d-flex gap-3">
                @if($book->availability)
                    <button class="btn btn-primary btn-lg">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                @else
                    <button class="btn btn-secondary btn-lg" disabled>
                        <i class="bi bi-x-circle"></i> Out of Stock
                    </button>
                @endif
                <button class="btn btn-outline-secondary btn-lg">
                    <i class="bi bi-heart"></i> Add to Wishlist
                </button>
            </div>
        </div>
    </div>

    <!-- Related Books -->
    @if($relatedBooks->count() > 0)
    <div class="mt-5">
        <h3 class="mb-4">Related Books in {{ $book->category->name }}</h3>
        <div class="row">
            @foreach($relatedBooks as $relatedBook)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body">
                        <h6 class="card-title">{{ Str::limit($relatedBook->title, 30) }}</h6>
                        <p class="text-muted small mb-2">by {{ $relatedBook->author }}</p>
                        <p class="card-text small">{{ Str::limit($relatedBook->description, 60) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-primary fw-bold">${{ $relatedBook->price }}</span>
                            @if($relatedBook->availability)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('books.show', $relatedBook) }}" class="btn btn-outline-primary w-100 btn-sm">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
