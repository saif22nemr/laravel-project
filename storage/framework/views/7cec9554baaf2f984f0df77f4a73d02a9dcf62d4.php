<?php $__env->startSection('title'); ?>
Posts
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo Form::open(['method'=>'PUT','action'=>['PostsController@update',$post->id]]); ?>


<!-- <form class="form-control" method="post" action="<?php echo e(route('posts.store')); ?>"> -->
	<?php echo Form::label('classOfLabel','Title'); ?>

	<?php echo Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter title!']); ?>

    <br>
    <?php echo Form::label('classOfLabel','Content'); ?>

	<?php echo Form::text('body',$post->body,['class'=>'form-control','placeholder'=>'Enter body!']); ?>


    <br>
    <!-- <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/> -->
    <?php echo Form::submit('Update Post',['class'=>'btn btn-primary','name'=>'updatePost']); ?>

    <!-- <input type="submit" name="submit"> -->
<!-- </form> -->
<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/posts/update.blade.php ENDPATH**/ ?>