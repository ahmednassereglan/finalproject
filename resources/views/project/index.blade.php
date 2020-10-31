<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
</head>

<body>

    <div class="navbg-bar" style="background-image: url({{ asset('img/bg.jpg') }});">
        
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand m-4" href="#"><img src="img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdownm" aria-controls="navbarNavDropdownm" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdownm">
                <ul class="navbar-nav pl-2 text-right justify-content-start">
                    <li class="nav-item active pl-5  ">
                        <a class="nav-link" href="{{route("project")}}">Home</a>
                    </li>
                    @foreach (App\Models\Category::whereNull("category_id")->get() as $cat)

                        @if ( $cat->sub_categories->count() >0 )
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="mnavbarDropdown{{$cat->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$cat->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="mnavbarDropdown{{$cat->id}}">
                                @foreach ($cat->sub_categories as $scat)
                                    <a class="dropdown-item" href="/user/category/{{$scat->id}}">   {{$scat->name}}</a>
                                @endforeach
                             
                              
                            </div>
                          </li>
                        @else                            
                            <li class="nav-item">
                            <a class="nav-link" href="/user/category/{{$cat->id}}">{{$cat->name}}</a>
                            </li>
                        @endif

                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{route("menu")}}">Our Products</a>
                        </li>
                    
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="nmavbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nmavbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                
            </div>
            

            <ul class="navbar-nav pl-5 text-center justify-content-end">
                <li class="nav-item active">
                    <span class="badge badge-dark badge-pill cart_item" style="font-size: 15px">0</span>
                </li>
                <li class="nav-item active">
                <a class="nav-link " href="{{route("bag")}}"><i class="fas fa-shopping-bag    " style="font-size: 20px"></i></a>
                </li>
                
                
            </ul>
        </nav>



        <div class="row row-cols-2 mt-5">
            <div class="col animate__animated animate__backInLeft animate__slower">
                <img src="{{ asset('img/slider-img.png') }}" alt="" width="570px" height="465px">
            </div>
            <div class="col animate__animated animate__backInRight animate__slower">
                <h1 class="display-6" style="font-size: 20px; font-weight: bold; color: white;">FROM $19.90</h1>
                <h1 class="display-3" style="font-size: 90px; font-weight: 500; font-family: Raleway; color: white;"><span style="font-size: 90px; font-weight:lighter; font-family: Raleway; color:#414141;">2020</span> SUMMER COLLECTION</h1>
                <a class="btn btn-secondary " href="#" role="button">Shop NOW!</a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark nnavbarscroll fixed-top" style="background-image: url({{ asset('img/bg.jpg') }});height: 70px;">
        <a class="navbar-brand m-4" href="#"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav pl-2 text-right justify-content-start">
                <li class="nav-item active pl-5  ">
                    <a class="nav-link" href="{{route("project")}}">Home</a>
                </li>
                @foreach (App\Models\Category::whereNull("category_id")->get() as $cat)

                    @if ( $cat->sub_categories->count() >0 )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{$cat->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$cat->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown{{$cat->id}}">
                            @foreach ($cat->sub_categories as $scat)
                                <a class="dropdown-item" href="/user/category/{{$scat->id}}">   {{$scat->name}}</a>
                            @endforeach
                            
                            
                        </div>
                        </li>
                    @else                            
                        <li class="nav-item">
                        <a class="nav-link" href="/user/category/{{$cat->id}}">{{$cat->name}}</a>
                        </li>
                    @endif

                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("menu")}}">Our Products</a>
                    </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            
        </div>
        

        <ul class="navbar-nav pl-5 text-center justify-content-end">
            <li class="nav-item active">
                <span class="badge badge-dark badge-pill cart_item" style="font-size: 15px">0</span>
            </li>
            <li class="nav-item active">
            <a class="nav-link " href="{{route("bag")}}"><i class="fas fa-shopping-bag" style="font-size: 20px"></i></a>
            </li>
            
        </ul>
    </nav>
    

    <div class="container mt-5">
        <h1 class="text-center section-title">LATEST PRODUCTS</h1>
        <p class="text-center">We recommend</p>
    </div>

    <div class="container">
        <div class="owl-carousel owl-theme">
            <div class="item product-item">
                <figure><img src="img/product-img/product-1.jpg"></figure>
                <h3>LATEST PRODUCTS</h3>
            </div>
            <div class="item product-item">
                <figure><img src="img/product-img/product-2.jpg"></figure>
                <h3>LATEST PRODUCTS</h3>
            </div>
            <div class="item product-item">
                <figure><img src="img/product-img/product-3.jpg"></figure>
                <h3>LATEST PRODUCTS</h3>
            </div>
            <div class="item product-item">
                <figure><img src="img/product-img/product-4.jpg"></figure>
                <h3>LATEST PRODUCTS</h3>
            </div>
            <div class="item product-item">
                <figure><img src="img/product-img/product-7.jpg"></figure>
                <h3>LATEST PRODUCTS</h3>
            </div>
            <div class="item product-item">
                <figure><img src="img/product-img/product-8.jpg"></figure>
                <h3>LATEST PRODUCTS</h3>
            </div>
        </div>

    </div>

    {{-- @foreach (App\Models\Category::whereNull("category_id")->get() as $cat)

        @if ( $cat->sub_categories->count() >0 )
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/user/category/{{$cat->id}}" id="mnavbarDropdown{{$cat->id}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{$cat->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="mnavbarDropdown{{$cat->id}}">
                @foreach ($cat->sub_categories as $scat)
                    <a class="dropdown-item" href="/user/category/{{$scat->id}}">   {{$scat->name}}</a>
                @endforeach
            
            
            </div>
        </li>
        @else                            
            <li class="nav-item">
            <a class="nav-link" href="/user/category/{{$cat->id}}">{{$cat->name}}</a>
            </li>
        @endif
    
    @endforeach --}}
    <div class="container">
        <div class="row m-auto row-cols-3">
            @foreach (App\Models\Category::whereNull("category_id")->get() as $cat)
                <div class="col col-lg-4 col-md-6 mb-5">
                    <figure class="snip1104 blue">
                        <img src="img/pro/model_2_bg.jpg" alt="sample35" />
                        <figcaption>
                            <h2>{{$cat->name}}</h2>
                        </figcaption>
                        <a href="/user/categories/{{$cat->id}}"></a>
                    </figure>
                </div>
            @endforeach
        </div>
       
    </div>

    <div class="site-section mt-5" id="products-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-6 text-center">
                    <h1 class="section-title mb-3"><a href="{{route("menu")}}"> Our Products</a></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum natus excepturi fuga ullam accusantium vel ut eveniet aut consequatur laboriosam ipsam.</p>
                </div>
            </div>
            <div class="row m-auto row-cols-3">
                @foreach (App\Models\Products::orderBy("created_at" ,"desc")->limit(9)->get() as $product)
                    
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
        </div>
    </div>

    <div class="row mb-5 justify-content-center">
        <div class="col-md-4 text-center">
            <h1 class="section-title mb-3">Featured Products</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum natus excepturi fuga ullam accusantium vel ut eveniet aut consequatur laboriosam ipsam.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-4 ml-5 text-center">
            <img src="img/featured/featured-1.jpg" alt="">
            {{-- <a href="#" class="btn btnmardin">ADD TO CART</a> --}}
        </div>

        <div class="col-4 offset-2 text-center">
            <img src="img/featured/featured-2.jpg" alt="">
            {{-- <a href="#" class="btn btnmardin">ADD TO CART</a> --}}
        </div>
    </div>

    <footer class="footer-bs mt-5">
        <div class="row">
            <div class="col-md-3 footer-brand animated fadeInLeft">
                <img class="mb-3" src="{{ asset('img/logo.png') }}">
                <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
                <p>© 2014 BS3 UI Kit, All rights reserved</p>
            </div>
            <div class="col-md-4 footer-nav animated fadeInUp">
                <h4>Menu —</h4>
                <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Nature</a></li>
                        <li><a href="#">Explores</a></li>
                        <li><a href="#">Science</a></li>
                        <li><a href="#">Advice</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInDown">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">RSS</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-ns animated fadeInRight">
                <h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                      </span>
                    </div><!-- /input-group -->
                 </p>
            </div>
        </div>
    </footer>
    <section style="text-align:center; margin:10px auto;"><p>Designed by <a href="#">Eng/Ahmed NAsser</a></p></section>
    

    <script src="{{ asset('js/app.js') }}" ></script>
      <script src="{{ asset('js/owl.carousel.min.js') }}" ></script>
      <script src="{{ asset('js/28d30b702d.js') }}" ></script>
    <script>
        $(document).ready(function(){
            if(localStorage.bag)
              bag = JSON.parse(localStorage.bag);
          else bag =[];
          $("#cart_item").html(bag.length);
    //   console.log(bag);

  
        });
      </script>
      <script>
          var owl = $('.owl-carousel');
          owl.owlCarousel({
              items: 4,
              loop: true,
              margin: 15,
              autoplay: true,
              autoplayTimeout: 4000,
              autoplayHoverPause: true
          });
          $('.play').on('click', function() {
              owl.trigger('play.owl.autoplay', [1000])
          })
          $('.stop').on('click', function() {
              owl.trigger('stop.owl.autoplay')
          });
  
          $(function() {
              $(window).scroll(function() {
                  if ($(this).scrollTop() > 100) {
                      $('.nnavbarscroll').removeClass("hid_nav");
                  } else {
                      $('.nnavbarscroll').addClass("hid_nav");
                  }
  
              });
          });
  
          $("figure").mouseleave(
              function() {
                  $(this).removeClass("hover");
              }
          );
      </script>
      <script>
          function addTobag (product ,link){
            
             if(localStorage.bag)
                bag = JSON.parse(localStorage.bag);
             else bag =[];
        
             if ( $(link).html() =="Add to Cart"){
                bag.push(product);
                // console.log(bag);
                localStorage.bag = JSON.stringify(bag);
        
                $(link).html("Remove from Cart");
              //   $(link).removeClass("btn-danger");
              //   $(link).addClass("btn-info");
              }else if( $(link).html() =="Remove from Cart"){        
                var i = 0;
                var rslt =0 ;
                for (el of bag){
                  console.log(el.id);
                  if(el.id == product.id){
                    rslt =i;
                    break;            
                  }
                  i++;
                }
                console.log(rslt);
                bag.splice(rslt , 1);
                // // bag.slice( product.id ,1);
                // console.log(bag);
                localStorage.bag = JSON.stringify(bag);
                $(link).html("Add to Cart");
              //   $(link).removeClass("btn-info");
              //   $(link).addClass("btn-danger");
              }
              $(".cart_item").html(bag.length);
        
            
            }
        </script>
       
   
    
</body>
</html>


    
 