@extends('layouts.web_app')
@section('content')
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
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment Methods</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <h5>Your order has been placed successfully! !</h5>
                        <img src="img/2381035.png" alt="" style="width:122px;margin-top: 54px;margin-left: -68px;">
                    </div><br>
                    <div class="row">
                        <p></p>
                        <p>You order has been confirmed and will be shipped according to the method you selected!</p>
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
  @endsection