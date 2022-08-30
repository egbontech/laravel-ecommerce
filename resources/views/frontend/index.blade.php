@extends('layouts.app')

@section('title','Homepage')

@section('content')
<div class="header">
    <div class="intro">
        <h1>Latest Laptops,Phones and Wristwatches.</h1>
        <p>20% Off On All Products</p>
       <a href="{{url('category')}}">Shop Now</a>
    </div>
</div>
<div style="width:70%;margin:auto">

    <marquee behavior="" direction=""style="margin:10px 0">This website is only a demo,this products are not real products.This website is still under development.</marquee>
</div>
<div class="py-5">
    <h1 style="text-align: center;font-weight:600;color:#185;margin:20px;margin-bottom:30px">All Categories</h1>
    <div class="container">
        <div class="row">
         @foreach($categories as $category)

            <div class="col-md-3">
                <a href="{{url('category/'.$category->slug)}}"class="link1">
                <div class="card mb-3">
                <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="product image">
                <div class="card-body">
                    <h3 style="text-align: center">{{$category->name}}</h3>
              </div>
            </div>
        </a>
        </div>

        @endforeach

      </div>
    </div>
</div>
<div class="py-5">
    <h1 style="text-align: center;font-weight:600;color:#185;margin:20px;margin-bottom:30px">Trending Products</h1>
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme featured">
         @foreach($featuredproducts as $product)
            <div class="item">

                <div class="card">
                <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product image">
                <div class="card-body">
                    <h3 style="text-align: center">{{$product->name}}</h3>
                    <div class="price">
                    <p style="color:#185;"><s>&#8358 {{$product->original_price}}</s></p>
                   <p style="color:#185;">&#8358 {{$product->selling_price}}</p>

                </div>
                <div class="view">
                    <a href="{{url('category/'.$category->slug.'/'.$product->slug)}}"class="link">View Detials</a>
                </div>
              </div>

            </div>

        </div>
        @endforeach
         </div>
      </div>
    </div>
</div>

<div class="py-5">
    <h1 style="text-align: center;font-weight:600;color:#185;margin:20px;margin-bottom:30px">New Arrivals</h1>
    <div class="container">
        <div class="row">
         @foreach($newproducts as $newproduct)

            <div class="col-md-3">

                <div class="card mb-3">
                <img src="{{asset('assets/uploads/product/'.$newproduct->image)}}" alt="product image">
                <div class="card-body">
                    <h3 style="text-align: center">{{$newproduct->name}}</h3>
                    <div class="price">
                    <p style="color:#185;"><s>&#8358 {{$newproduct->original_price}}</s></p>
                   <p style="color:#185;">&#8358 {{$newproduct->selling_price}}</p>

                </div>
                    <div class="view">
                    <a href="{{url('category/'.$category->slug.'/'.$newproduct->slug)}}"class="link">View Detials</a>
                </div>
              </div>

            </div>

        </div>


        @endforeach


      </div>
    </div>
</div>





@endsection
@section('scripts')
<script>
    $('.featured').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection
