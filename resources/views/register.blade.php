@extends('layout');
@section('content')
    <!-- Signup form starts -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ url('submit-register') }}" method="post" class="custom-form">
                    	@csrf
                        <div class="form-header">
                          @if(session()->has('status'))
	                        <div class="alert alert-success">
                             {{ session()->get('msg') }}
                             </div>
                         @endif
	
                            <h4 class="form-title">Sign-Up</h4>
                        </div>
                        <div class="row form-body">
                            <div class="form-group col-md-6">
                                <label for="">First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="">
                            @error('fname')
							  <div class="alert alert-danger">{{ 'Firstname ie required' }}</div>
							@enderror
                            </div>
                          
                            <div class="form-group col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="">
                                  @error('lname')
							  <div class="alert alert-danger">{{ 'Lastname ie required' }}</div>
							@enderror
                            </div>
                          
                            <div class="form-group col-md-12">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="">
                                 @error('email')
							  <div class="alert alert-danger">{{ $message }}</div>
							@enderror
                            </div>
                           
                            <div class="form-group col-md-12 mt-5 mb-5">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control mb-3" placeholder="New Password">
                            @error('password')
							  <div class="alert alert-danger">{{ $message }}</div>
							@enderror    
                                <input type="text" name="cpassword" class="form-control" placeholder="Confirm Password">
                            </div>
                         
                        </div>
                        <div class="form-footer">
                            <div class="form-group col-md-12">
                                <button class="btn form-btn">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup form ends -->

  @endsection  

