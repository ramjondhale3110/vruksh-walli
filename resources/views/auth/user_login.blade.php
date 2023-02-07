@extends('layouts.web_app')
@section('content')  
 <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sign useUp</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-2 mb-1"></div>
            <div class="col-lg-8 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                        {{method_field('post')}}
                        {{ csrf_field() }}
                        
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email"
                                required="required" data-validation-required-message="Please enter your email" />
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
@endsection