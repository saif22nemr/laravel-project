<?php $__env->startSection('title'); ?>
Posts
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<?php echo Form::open(['method'=>'post','action'=>'PostsController@store','files'=>true]); ?>


<!-- <form class="form-control" method="post" action="<?php echo e(route('posts.store')); ?>"> -->
	<?php echo Form::label('classOfLabel','Title'); ?>

	<?php echo Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter title!']); ?>

    <!-- <input type="text" name="title" placeholder="Enter title" > -->
    <br>
    <?php echo Form::label('classOfLabel','Content'); ?>

	<?php echo Form::text('body',null,['class'=>'form-control','placeholder'=>'Enter body!']); ?>

    <!-- <input type="text" name="body" placeholder="Enter body"> -->
    <br>
    <?php echo Form::file('file',['class'=>'form-control']); ?>

    <br>
    <!-- <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/> -->
    <?php echo Form::submit('Create Post',['class'=>'btn btn-primary','name'=>'createPost']); ?>

    <!-- <input type="submit" name="submit"> -->
<!-- </form> -->
<?php echo Form::close(); ?>


	<?php if($errors->any()): ?>
		<h2>Error in form: </h2>
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($err); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/posts/create.blade.php ENDPATH**/ ?>