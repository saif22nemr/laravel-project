<?php $__env->startSection('title'); ?>
	Test Page
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layout.include.tinyEditor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<textarea class="form-control">some text here</textarea>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/test.blade.php ENDPATH**/ ?>