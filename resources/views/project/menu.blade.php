@extends('layouts.project')
@section('content')   
<div class="row m-auto row-cols-3">
    @foreach (App\Models\Products::orderBy("created_at" ,"desc")->get() as $product)
        
        <div class="col col-lg-4 col-md-6 mb-5">
            <div class="product-item">
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
                <div class="px-4">
                    <h3><a href="#">{{$product->name}}</a></h3>
                    <div class="mb-3">
                        <span class="meta-icons mr-3"><a href="#" class="mr-2"><i class="fa fa-star" aria-hidden="true"></i></a> 5.0</span>
                        <span class="meta-icons wishlist"><a href="#" class="mr-2"> <i class="fa fa-heart" aria-hidden="true"></i></a> 29</span>
                    </div>
                    <p>{{$product->price}}</p>
                    @foreach ($product->images as $img)
                    <p class="mb-4">{{$img->comments}}</p>
                    @endforeach
                    <div>
                        <a href="#" class="btn btn-black mr-1 rounded-0"  onclick="addTobag({{$product->toJson()}} ,this)">Add to Cart</a>
                        <a href="/user/product/{{$product->id}}" class="btn btn-black btn-outline-black ml-1 rounded-0">View</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
</div>
@endsection

@section('pro')
Our Products
@endsection
{{-- @section('proo')
{{  $cat->name }}
@endsection --}}