

<?php $__env->startSection('title', 'Home - BookStore'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">Welcome to Our Online Book Store</h1>
                <p class="lead mb-4">Discover thousands of books across all genres. From bestsellers to hidden gems, find your next great read here.</p>
                <a href="<?php echo e(route('books.index')); ?>" class="btn btn-light btn-lg">
                    <i class="bi bi-book"></i> Browse Books
                </a>
            </div>
            <div class="col-lg-4">
                <!-- Weather Widget -->
                <div class="weather-widget p-4 text-center">
                    <h5><i class="bi bi-geo-alt"></i> <?php echo e($weather['name'] ?? 'Weather'); ?></h5>
                    <div class="h2"><?php echo e($weather['main']['temp'] ?? '22'); ?>°C</div>
                    <p class="mb-0"><?php echo e($weather['weather'][0]['description'] ?? 'Clear sky'); ?></p>
                    <small>Humidity: <?php echo e($weather['main']['humidity'] ?? '65'); ?>%</small>
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
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo e($category->name); ?></h5>
                        <p class="card-text"><?php echo e($category->description); ?></p>
                        <span class="badge category-badge"><?php echo e($category->books_count); ?> books</span>
                        <div class="mt-3">
                            <a href="<?php echo e(route('books.index', ['category' => $category->id])); ?>" class="btn btn-primary">
                                View Books
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<!-- Featured Books Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Featured Books</h2>
        <div class="row">
            <?php $__currentLoopData = $featuredBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2"><?php echo e($book->category->name); ?></span>
                        <h5 class="card-title"><?php echo e($book->title); ?></h5>
                        <p class="text-muted mb-2">by <?php echo e($book->author); ?></p>
                        <p class="card-text"><?php echo e(Str::limit($book->description, 100)); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary">$<?php echo e($book->price); ?></span>
                            <?php if($book->availability): ?>
                                <span class="badge bg-success">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Out of Stock</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-primary w-100">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?php echo e(route('books.index')); ?>" class="btn btn-outline-primary btn-lg">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Siddharth Soni\online-book-store\resources\views/home.blade.php ENDPATH**/ ?>