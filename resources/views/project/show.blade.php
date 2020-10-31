@extends('layouts.project')
@section('content')
<div class="container">
    <div class="card w-md-50 w-75 my-5">
        <h5 class="card-header text-center text-primary"> {{ $product->name }}</h5>
        <div class="card-body">
              <figure style="width: 300px; height: 340px; margin: auto">
                <div id="carouselExampleControls{{$product->id}}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    @foreach ($product->images as $image)
                    <div class="carousel-item 
                                    @if ($loop->first)
                                    active
                                    @endif
                                ">
                        <img src="{{asset('storage/'.$image->img)}}" class="d-block w-100" alt="{{$product->name}}" style="width: 200px; height: 340px;" >
                    
            
                    </div>
                    @endforeach
                    
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls{{$product->id}}" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </figure>
            
            <p class="card-text">Quantity: {{ $product->qty }}</p>
            <p class="card-text">Price: {{ $product->price }} <sup>$</sup></p>
            <p class="card-text">Brand: {{ $brand->name }}</p>
            <p class="card-text">Category: {{  $cat->main_category->name }}</p>
            <p class="card-text">Sup Category: {{ $cat->name }}</p> 
            <a href="#" class="btn btn-primary">Add to cart </a>
            
        </div>
    </div>
</div>
@endsection
@section('pro')
{{  $cat->main_category->name }}
@endsection
@section('proo')
{{  $cat->name }}
@endsection