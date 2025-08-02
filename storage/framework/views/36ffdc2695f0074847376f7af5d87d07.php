

<?php $__env->startSection('title', 'Search Results - Online Book Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1 class="mb-4">Search Results for "<?php echo e($query); ?>"</h1>
    
    <?php if($books->count() > 0): ?>
        <p class="text-muted mb-4">Found <?php echo e($books->total()); ?> result<?php echo e($books->total() > 1 ? 's' : ''); ?></p>
        
        <!-- Books Grid -->
        <div class="row">
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 card-hover">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2"><?php echo e($book->category->name); ?></span>
                        <h5 class="card-title"><?php echo e(Str::limit($book->title, 40)); ?></h5>
                        <p class="text-muted mb-2">by <?php echo e($book->author); ?></p>
                        <p class="card-text small"><?php echo e(Str::limit($book->description, 80)); ?></p>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="h6 text-primary mb-0">$<?php echo e($book->price); ?></span>
                            <?php if($book->availability): ?>
                                <span class="badge bg-success">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Out of Stock</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-primary w-100 btn-sm">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <!-- Pagination -->
        <?php if($books->hasPages()): ?>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($books->appends(['q' => $query])->links()); ?>

        </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="text-center py-5">
            <i class="bi bi-search display-1 text-muted"></i>
            <h3 class="mt-3">No books found</h3>
            <p class="text-muted">We couldn't find any books matching "<?php echo e($query); ?>"</p>
            <div class="mt-4">
                <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary me-2">Browse All Books</a>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-outline-secondary">Back to Home</a>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Siddharth Soni\online-book-store\resources\views/books/search.blade.php ENDPATH**/ ?>