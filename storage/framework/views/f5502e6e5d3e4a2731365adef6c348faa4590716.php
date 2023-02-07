
<?php $__env->startSection('content'); ?>  
 <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sign Up</span></h2>
        <div class="row px-xl-5">
        	<div class="col-lg-2 mb-1"></div>
            <div class="col-lg-8 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form action="<?php echo e(route('reg.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(method_field('post')); ?>

                        <?php echo e(csrf_field()); ?>

                        <div class="control-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"
                                required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Phone Number"
                                required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                        	<input type="password" class="form-control" name="password" id="password" placeholder="Password"
                        	required="required" data-validation-required-message="Please enter a subject" />
                        	<p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Sign Up
                                </button>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/web_register.blade.php ENDPATH**/ ?>