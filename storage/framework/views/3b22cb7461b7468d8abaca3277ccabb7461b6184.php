
<?php $__env->startSection('content'); ?>
<style type="text/css">

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Breadcrumb Start -->

    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="<?php echo e(url('payment_details')); ?>" method="post">
    <div class="col-lg-8">
        <h5 class="section-title position-relative text-uppercase mb-12"><span class="bg-secondary pr-12">Order Total</span></h5>
        <div class="bg-light p-30 mb-8">
            <div class="border-bottom">
                <h6 class="mb-3">Products</h6>
                 <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between"> 
                    <p><?php echo e($order->cart_product->product_name); ?></p>
                    <p><?php echo e($order->cart_product->final_price); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="border-bottom pt-3 pb-2">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Subtotal</h6>
                    <h6><?php echo e($order->price); ?></h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Shipping</h6>
                    <h6 class="font-weight-medium">$10</h6>
                </div>
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-between mt-2">
                    <h5>Total</h5>
                    <h5><?php echo e($order->price); ?></h5>
                </div>
            </div>

        </div>
        <div class="bg-light p-30">
            <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit" ><a href="<?php echo e(url('place_order')); ?>" style="color:black;">Place Order</a></button>
        </div>
    </div>
    </form>           
    <!-- Checkout End -->
   
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/payment_details.blade.php ENDPATH**/ ?>