@extends('layout')

@section('content')

 <!-- Character details starts -->
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">View Character Page</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="detail-page">
                    <a href="{{ url('/characters') }}" class="back-link"> < Back to listing page</a>
                    <h2 class="character-name">Character Name : {{ $CurlData['name'] }}</h2>
                    <h4 class="character-info">Height:{{ $CurlData['height'] }}</h4>
                    <h4 class="character-info">Hair Colour:{{ $CurlData['hair_color'] }}</h4>
                    <h4 class="character-info">Gender:{{ $CurlData['gender'] }}</h4>

                    <div class="action-btns">
                    	 <?php $user_id = Auth::user()->id; $character_id = (explode('/',$CurlData['url'],6)); //print_r($id); ?>
                        <a href="{{ url('save-character/'.$user_id.'/'.$character_id['5']) }}" class="btn btn-dark">Save Character</a>


                        <a href="{{ url('delete-character/'.$user_id.'/'.$character_id['5']) }}" class="btn btn-dark">Delete Character</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Character details ends -->

@endsection