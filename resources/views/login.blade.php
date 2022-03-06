@extends('layout')
@section('content')
    <!-- Signup form starts -->

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">


                      @if(session()->has('status'))
                         @if(session()->get('status') == 'error' )
                             <div class="alert alert-danger">
                         @endif
                         @if(session()->get('status') == 'success' )
                             <div class="alert alert-success">
                        @endif
                         {{ session()->get('msg') }}
                    </div>
                    @endif



                    <form action="{{ url('submit-login') }}" method="post" class="custom-form">
                        @csrf
                        <div class="form-header">
                            <h4 class="form-title">Log-In</h4>
                        </div>
                        <div class="row form-body">
                            <div class="form-group col-md-12">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="">
                            @error('email')
                              <div class="alert alert-danger">{{ 'Email ie required' }}</div>
                            @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Password</label>
                                <input type="text" name="password" value="{{ old('password') }}" class="form-control mb-3" placeholder="">
                             @error('password')
                              <div class="alert alert-danger">{{ 'Password ie required' }}</div>
                            @enderror    
                            </div>
                        </div>
                        <div class="form-footer">
                            <div class="form-group col-md-12">
                                <button class="btn form-btn">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup form ends -->

@endsection