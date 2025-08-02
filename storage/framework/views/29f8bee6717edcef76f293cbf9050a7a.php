

<?php $__env->startSection('title', 'Manage Books - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Books</h1>
        <div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-outline-secondary me-2">Dashboard</a>
            <a href="<?php echo e(route('admin.books.create')); ?>" class="btn btn-primary">Add New Book</a>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($book->title); ?></td>
                    <td><?php echo e($book->author); ?></td>
                    <td><?php echo e($book->category->name); ?></td>
                    <td>$<?php echo e($book->price); ?></td>
                    <td>
                        <?php if($book->availability): ?>
                            <span class="badge bg-success">Available</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Out of Stock</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="<?php echo e(route('admin.books.show', $book)); ?>" class="btn btn-sm btn-outline-info">View</a>
                            <a href="<?php echo e(route('admin.books.edit', $book)); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form method="POST" action="<?php echo e(route('admin.books.destroy', $book)); ?>" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <p class="text-muted mb-0">No books found</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if($books->hasPages()): ?>
    <div class="d-flex justify-content-center mt-4">
        <?php echo e($books->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Siddharth Soni\online-book-store\resources\views/admin/books/index.blade.php ENDPATH**/ ?>