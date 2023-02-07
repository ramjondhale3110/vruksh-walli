
<?php $__env->startSection('content'); ?>
<style type="text/css">

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-9">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment Methods</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <form action="<?php echo e(url('payment_details')); ?>" method="POST" id="form-id">
                            <?php echo csrf_field(); ?>
                        <input type="hidden" name="cashondelivery" value="<?php echo e($cart[0]->new_id); ?>">
                            <button type="submit" id="cod-button"  onclick="document.getElementById('form-id').submit();" style=" border: none !important;">
                                <img src="<?php echo e(asset('img/cod.png')); ?>" alt="" style="margin-top: 50px;width:350px;" >
                            </button>
                        </form>
                    </div><br>
                    <div class="row">
                     <img src="<?php echo e(asset('img/cod.png')); ?>" alt="" style="margin-top: 50px;width:350px;">
                     <img src="<?php echo e(asset('img/download.png')); ?>" alt="" style="width:350px;margin-top: 50px;height: 130px; margin-left: 70px;">
                 </div>
                 <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-block btn-primary font-weight-bold py-6" id="show" style="width:250px">Go to shopping</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-block btn-primary font-weight-bold py-6" style="width:250px">Check Orders</button>
                    </div>       
                </div>  
            </div>
        </div>
        </div>
    </div>
    <!-- Checkout End -->
    <script type="text/javascript">
    // $('body').on('click','button#cod-button',function(){
    //     var pro_id = $('input#cashondelivery').val();
    //    $.ajaxSetup({
    //         headers: {
    //           'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
    //       }
    //   });

    //    $.ajax({
    //     type: "post",
    //     url : "<?php echo e(url('checkout-complete')); ?>",
    //     data: {new_id:pro_id},
    //     success: function(response)
    //         {
    //             console.log(response);
    //             /*if (response == 'login') {
    //                  window.location.href= "<?php echo e(url('payment_details')); ?>"+"/"+pro_id;
    //             }*/
                
    //         }
    //    });
    // });    
    </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/checkout_payment.blade.php ENDPATH**/ ?>