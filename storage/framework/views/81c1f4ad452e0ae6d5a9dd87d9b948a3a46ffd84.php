<?php $__env->startSection('title'); ?>
My Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Profile</h2>
            <hr>
            <h3>My Orders</h3>
            
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $order->cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <li class="list-group-item">
                                    <span class="badge">
                
                                       Rs. <?php echo e($item['price']); ?></span>
                                        <?php echo e($item['item']['title']); ?> |  <?php echo e($item['qty']); ?> Units
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Total Price : Rs.<?php echo e($order->cart->totalprice); ?></strong>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>