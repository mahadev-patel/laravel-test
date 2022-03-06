@extends('layout');
@section('content')

    <!-- Character listing starts -->
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">Character Listing Page</h4>
        </div>
        <div class="row">
            <div class="col-lg-12">
            	 @if(session()->has('status'))
	                        <div class="alert alert-success">
                             {{ session()->get('msg') }}
                             </div>
                         @endif
                <h5 class="page-heading-small">Characters</h5>
            </div>
            @if($allData)

            @foreach($allData as $data)
            <div class="col-lg-3 col-md-6">
                <div class="character-card">
                    <?php 
                    $id = (explode('/',$data['url'],6));
                    $id = str_replace('/','',$id);
                    ?>
                    <h4>ID: {{$id['5']}}</h4>
                    <h4>Name: {{ $data['name'] }}</h4>
                    <h4>Gender: {{ $data['gender'] }}</h4>
                    <a href="{{ url('characters/'.$id['5']) }}" class="link-view">
                        View More
                    </a> 
                </div>
            </div>
            @endforeach
            @endif
         
        </div>

        <!-- Pagination -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        @if($page>1)
                        <li class="page-item">
                            <a class="page-link" href="{{url('/characters/?page='.($page-1))}}" aria-label="Previous">
                                <span aria-hidden="true"><img src="{{url('images/arrow-prev.png')}}" alt=""></span>
                            </a>
                        </li>
                        @endif
                        
                        @for($i=1;$i<=$number_of_pages;$i++)
                        <li class="page-item @if($page==$i) active @endif"><a class="page-link" href="{{url('/characters/?page='.$i)}}">{{$i}}</a></li>
                        
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="{{url('/characters/?page='.($page+1))}}" aria-label="Next">
                                <span aria-hidden="true"><img src="{{url('images/arrow-next.png')}}" alt=""></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Character listing ends -->

@endsection
