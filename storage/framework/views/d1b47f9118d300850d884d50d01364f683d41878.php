<?php $__env->startSection('phpCode'); ?>
	<?php
		$page = 'User';
	?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	Users
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">User Table</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" >
                                            <a href="<?php echo e(route('user.create')); ?>"><i class="zmdi zmdi-plus"></i>add user</a></button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </th>
                                                <th>number</th>
                                                <th>name</th>
                                                <th>email</th>
                                                
                                                <th>date</th>
                                                
                                                
                                                <th>control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                
                                            <?php
                                                if($users->currentPage() == 1)
                                                    $count =1;
                                                else{
                                                    $count = 5*($users->currentPage()-1);
                                                    $count++;
                                                }
                                            ?>
                                        	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                            <tr class="tr-shadow">
	                                                <td>
	                                                    <label class="au-checkbox">
	                                                        <input type="checkbox">
	                                                        <span class="au-checkmark"></span>
	                                                    </label>
	                                                </td>
                                                    <td><?php echo e($count); ?></td>
	                                                <td><?php echo e($user->name); ?></td>
	                                                <td>
	                                                    <span class="block-email"><?php echo e($user->email); ?></span>
	                                                </td>
	                                                
	                                                <td><?php echo e($user->created_at); ?></td>
	                                                
	                                                <td>
	                                                    <div class="table-data-feature">
                                                            <form action="<?php echo e(route('user.edit',$user->id)); ?>" method="get" id="edit">
                                                                <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                                                                    
                                                            </form>
                                                            <form action="<?php echo e(route('user.destroy',$user->id)); ?>" method="post" id="delete">
                                                                <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
                                                                <input type="hidden" name="_method" value="DELETE">
                                                            </form>
	                                                        <button type="submit" form="edit" class="item" data-toggle="tooltip" data-placement="top" title="Edit" >
                                                                <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
	                                                            <i class="zmdi zmdi-edit"></i>
	                                                        </button>
	                                                        <button type="submit" form="delete" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
	                                                            <i class="zmdi zmdi-delete"></i>
	                                                        </button>
	                                                        </form>
	                                                    </div>
	                                                </td>
	                                            </tr>
	                                            <tr class="spacer"></tr>
                                                <?php $count++;?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="row justify-content-md-center">
                                        <div class="col-sm-6 col-sm-offset-5 center">
                                            <div class="center" >
                                            <?php echo e($users->links()); ?>

                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first-project\resources\views/user/index.blade.php ENDPATH**/ ?>