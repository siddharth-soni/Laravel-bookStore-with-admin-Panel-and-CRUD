@extends('layouts.app')

@section('title', 'Admin Dashboard - Online Book Store')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <!-- Dashboard Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="h1 mb-1">{{ $totalBooks }}</div>
                    <div class="text-muted">Total Books</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="h1 mb-1">{{ $availableBooks }}</div>
                    <div class="text-muted">Available Books</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="h1 mb-1">{{ $totalCategories }}</div>
                    <div class="text-muted">Categories</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Books -->
    <h3 class="mb-3">Recent Books</h3>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBooks as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>${{ $book->price }}</td>
                    <td>
                        @if($book->availability)
                            <span class="badge bg-success">Available</span>
                        @else
                            <span class="badge bg-danger">Out of Stock</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
