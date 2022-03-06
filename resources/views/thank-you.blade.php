@extends('layout');
@section('content')

<div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="" class="custom-form">
                        <div class="form-header">
                            <img src="images/tick-icon.png" alt="tick" class="header-icon">
                            <h4 class="form-title">Thank You</h4>
                            <p class="form-subheader">Lorem Ipsum Dolor Sit Amet!</p>
                        </div>
                        <div class="form-group form-body">
                            <p class="form-content mb-5">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries
                            </p>
                            <button class="btn form-btn"><a href="{{route('login')}}">Login Here</a></button>
                        </div>
                        <div class="form-footer">
                            <p>Lorem ipsum</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
