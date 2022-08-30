@extends('layouts.app')

@section('title','Products')

@section('content')
<div class="py-3 mb-4 border-top shadow-sm "style="color:#191919">
    <div class="container">
        <h4 class="mb-0">Shop/{{$category->name}}</h4>
    </div>
</div>
<div class="py-5">
    
    <h1 style="text-align: center;font-weight:600;color:#185;margin:20px;margin-bottom:30px">{{$category->name}}</h1>
    <div class="container">
        <div class="row">
          
         @foreach($products as $product)
            <div class="col-md-3 mb-3">  
                <a href="{{url('category/'.$category->slug.'/'.$product->slug)}}" style="text-decoration: none;color:#191919;">    
                <div class="card"> 
          
                <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product image">
                <div class="card-body">
                    <h3 style="text-align: center">{{$product->name}}</h3>
                    <div class="price">
                    <p style="color:#185;"><s>&#8358 {{$product->original_price}}</s></p>
                   <p style="color:#185;">&#8358 {{$product->selling_price}}</p>    
                </div>   
              </div>  
            </div>
        </a>
        </div>
        @endforeach
         
      </div>
    </div>
</div>

@endsection