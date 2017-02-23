<?php $__env->startSection('title'); ?>
My Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>
                    <div class="panel-body">
                        <label  class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <?php echo e($users->name); ?>

                            </div>
                        

                        
                            <label class="col-md-4 control-label">E-mail Address</label>

                            <div class="col-md-6">
                                <?php echo e($users->email); ?>

                            </div>
                        </div></div></div></div></div>
                     </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>