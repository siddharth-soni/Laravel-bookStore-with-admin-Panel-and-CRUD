@extends('layouts.app')

@section('title', 'Home - BookStore')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Welcome to Our Online Book Store</h1>
                <p class="lead mb-4">Discover thousands of books across all genres. From bestsellers to hidden gems, find your next great read here.</p>
                <a href="{{ route('books.index') }}" class="btn btn-light btn-lg">
                    <i class="bi bi-book"></i> Browse Books
                </a>
            </div>
            <div class="col-lg-4">
                <!-- Weather Widget -->
                <div class="weather-widget p-4 text-center">
                    <h5><i class="bi bi-geo-alt"></i> {{ $weather['name'] ?? 'Weather' }}</h5>
                    <div class="h2">{{ $weather['main']['temp'] ?? '22' }}°C</div>
                    <p class="mb-0">{{ $weather['weather'][0]['description'] ?? 'Clear sky' }}</p>
                    <small>Humidity: {{ $weather['main']['humidity'] ?? '65' }}%</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Browse by Category</h2>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <span class="badge category-badge">{{ $category->books_count }} books</span>
                        <div class="mt-3">
                            <a href="{{ route('books.index', ['category' => $category->id]) }}" class="btn btn-primary">
                                View Books
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Books Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Books</h2>
        <div class="row">
            @foreach($featuredBooks as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">{{ $book->category->name }}</span>
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="text-muted mb-2">by {{ $book->author }}</p>
                        <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary">${{ $book->price }}</span>
                            @if($book->availability)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary w-100">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('books.index') }}" class="btn btn-outline-primary btn-lg">
                View All Books <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card border-0">
                    <div class="card-body">
                        <i class="bi bi-book text-primary display-4"></i>
                        <h3 class="mt-3">1000+</h3>
                        <p class="text-muted mb-0">Books Available</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0">
                    <div class="card-body">
                        <i class="bi bi-people text-success display-4"></i>
                        <h3 class="mt-3">5000+</h3>
                        <p class="text-muted mb-0">Happy Customers</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0">
                    <div class="card-body">
                        <i class="bi bi-star text-warning display-4"></i>
                        <h3 class="mt-3">4.8</h3>
                        <p class="text-muted mb-0">Average Rating</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
