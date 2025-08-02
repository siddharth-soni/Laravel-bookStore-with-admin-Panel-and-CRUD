@extends('layouts.app')

@section('title', 'View Book - Admin')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Book Details</h1>
        <div>
            <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-primary me-2">Edit Book</a>
            <a href="{{ route('admin.books.index') }}" class="btn btn-outline-secondary">Back to Books</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Title:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->title }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Author:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->author }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Category:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->category->name }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Price:</strong>
                        </div>
                        <div class="col-sm-9">
                            ${{ $book->price }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Availability:</strong>
                        </div>
                        <div class="col-sm-9">
                            @if($book->availability)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </div>
                    </div>
                    
                    @if($book->description)
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->description }}
                        </div>
                    </div>
                    @endif
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Created:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->created_at->format('M d, Y h:i A') }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Last Updated:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->updated_at->format('M d, Y h:i A') }}
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-primary">Edit Book</a>
                        <form method="POST" action="{{ route('admin.books.destroy', $book) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Book</button>
                        </form>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-outline-info" target="_blank">View Public Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
