

<?php $__env->startSection('title', 'Admin Dashboard - Online Book Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    
    <!-- Dashboard Stats -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="h1 mb-1"><?php echo e($totalBooks); ?></div>
                    <div class="text-muted">Total Books</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="h1 mb-1"><?php echo e($availableBooks); ?></div>
                    <div class="text-muted">Available Books</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="h1 mb-1"><?php echo e($totalCategories); ?></div>
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
                <?php $__currentLoopData = $recentBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Siddharth Soni\online-book-store\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>