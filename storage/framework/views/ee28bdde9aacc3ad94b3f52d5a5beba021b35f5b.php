<?php $__env->startSection('title'); ?>
    Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
		<div class="subject">
			<div class="title">Get data from database table posts</div>
			<div class="content">
                Geting data from database table posts:
                <ul>
                	<?php if(count($result)): ?>
                		<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                			<li>
                				<ul>
                				<?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                					<li><?php echo e($key); ?> = <?php echo e($value); ?></li>
                				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                				</ul>
                				<br>
                			</li>
                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	<?php endif; ?>
                </ul>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/post.blade.php ENDPATH**/ ?>