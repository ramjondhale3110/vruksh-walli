
<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="delete_row" data-product-id="<?php echo e($carts->cart_id); ?>">    
                            <td class="align-middle"><img src="<?php echo e($carts->cart_product->product_img); ?>" alt="" style="width: 50px;"><?php echo e($carts->cart_product->product_name); ?></td>
                            <td class="align-middle"><?php echo e($carts->cart_product->product_unit_price); ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo e($carts->quantity); ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" style="color:black;"><?php echo e($carts->price); ?></td>
                            <td class="align-middle"><button type="button" class="btn btn-sm btn-danger deletebtn"><i class="fa fa-times"></i></button></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3"><a href="<?php echo e(url('checkout')); ?>" style="color:black;">Proceed To Checkout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script type="text/javascript">
        $('body').on('click','button.deletebtn',function(){
            product_id = $(this).closest('#delete_row').attr('data-product-id')
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
              }
          });
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('delete_cart')); ?>",
                data: {cart_id:product_id},
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            });
        });

        
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/cart.blade.php ENDPATH**/ ?>