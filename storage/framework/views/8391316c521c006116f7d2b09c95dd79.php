

<?php $__env->startSection('title', 'View Book - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Book Details</h1>
        <div>
            <a href="<?php echo e(route('admin.books.edit', $book)); ?>" class="btn btn-primary me-2">Edit Book</a>
            <a href="<?php echo e(route('admin.books.index')); ?>" class="btn btn-outline-secondary">Back to Books</a>
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
                            <?php echo e($book->title); ?>

                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Author:</strong>
                        </div>
                        <div class="col-sm-9">
                            <?php echo e($book->author); ?>

                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Category:</strong>
                        </div>
                        <div class="col-sm-9">
                            <?php echo e($book->category->name); ?>

                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Price:</strong>
                        </div>
                        <div class="col-sm-9">
                            $<?php echo e($book->price); ?>

                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Availability:</strong>
                        </div>
                        <div class="col-sm-9">
                            <?php if($book->availability): ?>
                                <span class="badge bg-success">Available</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Out of Stock</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if($book->description): ?>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-sm-9">
                            <?php echo e($book->description); ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Created:</strong>
                        </div>
                        <div class="col-sm-9">
                            <?php echo e($book->created_at->format('M d, Y h:i A')); ?>

                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Last Updated:</strong>
                        </div>
                        <div class="col-sm-9">
                            <?php echo e($book->updated_at->format('M d, Y h:i A')); ?>

                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <div class="d-flex gap-2">
                        <a href="<?php echo e(route('admin.books.edit', $book)); ?>" class="btn btn-primary">Edit Book</a>
                        <form method="POST" action="<?php echo e(route('admin.books.destroy', $book)); ?>" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete Book</button>
                        </form>
                        <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-outline-info" target="_blank">View Public Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Siddharth Soni\online-book-store\resources\views/admin/books/show.blade.php ENDPATH**/ ?>