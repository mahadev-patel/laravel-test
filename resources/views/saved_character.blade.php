@extends('layout')

@section('content')

    <!-- Character saved starts -->
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">Saved Character</h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h5 class="page-heading-small">Saved Characters</h5>
            </div>
            @if($sub_curl_data)
            @foreach($sub_curl_data as $data)
            <div class="col-lg-3 col-md-6">
                <div class="character-card">
                	<?php 
                    $id = (explode('/',$data['url'],6));  
                    ?>
                   
                    <h4><?php echo $id['5']; ?></h4>
                    <h4>{{$data['name'] }}</h4>
                    <h4>{{$data['gender'] }}</h4>
                    <a href="{{ url('characters/'.$id['5']) }}" class="link-view">
                        View More
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <h1>No Records Founds</h1>
            @endif
          
           
        </div>


    </div>
    <!-- Character saved ends -->

@endsection