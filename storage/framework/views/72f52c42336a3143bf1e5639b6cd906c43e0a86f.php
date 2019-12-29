<?php $__env->startSection('title'); ?>
	Post
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="alert alert-success center test">Home</div>
	<div class="container">
		<div class="subject">
			<div class="title">Show Posts</div>
			<div class="content">
				<a href="<?php echo e(route('posts.create')); ?>" class="center"><h3>Create Post</h3></a>
				<h2>Posts :</h2>
				<ul>
					<?php if(count($posts)): ?>
						<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>Row : <br>
								<a href="<?php echo e(route('posts.edit',$post->id)); ?>">ID : <?php echo e($post->id); ?></a><br>
								Title : <?php echo e($post->title); ?><br>
								Body : <?php echo e($post->body); ?><br>
                                                                                                                                <?php if(array_key_exists($post->id,$images)): ?>
                                                                                                                                    <?php if(count($images[$post->id])>0): ?>
                                                                                                                                        <?php $__currentLoopData = $images[$post->id]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                        <a href="<?php echo e(route('post.show.image',$img)); ?>">Image</a>
                                                                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                                                     <?php endif; ?>
                                                                                                                                <?php endif; ?>
								<!-- <form method="post" action="<?php echo e(route('posts.destroy',$post->id)); ?>"> -->
									<?php echo Form::open(['method'=>'DELETE','action'=>['PostsController@destroy',$post->id]]); ?>

									<input type="submit" name="submit1" value="Delete">
									<!-- <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/> -->
								<!-- </form> -->
								<?php echo Form::close(); ?>

							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<h2 class="center">There no post!</h2>
					<?php endif; ?>

				</ul>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/posts/show.blade.php ENDPATH**/ ?>