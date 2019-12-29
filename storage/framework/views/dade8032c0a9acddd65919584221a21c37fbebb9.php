<?php $__env->startSection('title'); ?>
	Contact
<?php $__env->stopSection(); ?>
<?php
//comment
?>
<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="subject">
			<div class="title">get array from controller</div>
			<div class="content">
				<span>this id from url : <?php echo e($id ?? ''); ?></span>
				<h2>People Arrary:</h2>
				<ul>
					<?php if(count($people)): ?>
						<?php $__currentLoopData = $people; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($person); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/contact.blade.php ENDPATH**/ ?>