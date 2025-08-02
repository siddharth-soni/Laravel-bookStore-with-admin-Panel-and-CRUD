

<?php $__env->startSection('title', 'All Books - Show Books'); ?>

<?php $__env->startSection('content'); ?>
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
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="flex-grow-1">
                    <label for="availability" class="form-label">Availability</label>
                    <select name="availability" id="availability" class="form-select">
                        <option value="">All Books</option>
                        <option value="1" <?php echo e(request('availability') == '1' ? 'selected' : ''); ?>>Available</option>
                        <option value="0" <?php echo e(request('availability') == '0' ? 'selected' : ''); ?>>Out of Stock</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-outline-secondary">Clear</a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Books Grid -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-book display-1 text-muted"></i>
                <h3 class="mt-3">No books found</h3>
                <p class="text-muted">Try adjusting your search criteria.</p>
                <a href="<?php echo e(route('books.index')); ?>" class="btn btn-primary">View All Books</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Pagination -->
    <?php if($books->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($books->appends(request()->query())->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Siddharth Soni\online-book-store\resources\views/books/index.blade.php ENDPATH**/ ?>