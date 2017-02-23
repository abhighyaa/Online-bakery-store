<?php $__env->startSection('title'); ?>
	Shopping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(Session::has('success')): ?>
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<div id="charge-message" class="alert alert-success">
				<?php echo e(Session::get('success')); ?>

			</div>
		</div>
	</div>
	<?php endif; ?>
	<!--<h1>It Works!!</h1>-->
	<?php $__currentLoopData = $products->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productChunk): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<div class="row">
			<?php $__currentLoopData = $productChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<div class="col-sm-6 col-md-4">
			    	<div class="thumbnail">
			      		<img src="<?php echo e($product->imagepath); ?>" alt="..." class="img-responsive">
			      		<div class="caption">
			        		<h3><?php echo e($product->title); ?></h3>
			        		<p class="description">
			        			<?php echo e($product->description); ?>

			        		</p>
			        		<div class="clearfix">
				        		<div class="pull-left price">
				        			Rs. <?php echo e($product->price); ?>

				        		</div>
			        			<a href="<?php echo e(route('product.addtocart', ['id' => $product->id])); ?>" class="btn btn-success pull-right" role="button">Add to Cart</a>
			        		</div>
			        	</div>
			      	</div>
			    </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>