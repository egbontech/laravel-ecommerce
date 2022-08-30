@extends('layouts.app')

@section('title',$product->name)

@section('content')
<div class="py-3 mt-5 border-top shadow-sm "style="color:#191919">
    <div class="container">
        <h5 class="mb-0">Shop/{{$product->category->name}}/{{$product->name}}</h5>
    </div>
</div>
<div class="container "style="margin-top:50px">
    <div class="card product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product-image"class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}}
                        @if($product->trending == '1')
                        <label style="font-size:16px"class="float-end badge bg-secondary trending_tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3"style="color:#185;">Original Price : &#8358 <s>{{$product->original_price}}</s></label>
                    <label class="me-3"style="color:#185;">Selling Price :&#8358  {{$product->selling_price}}</label>
                    <p class="mt-3">
                        {{$product->small_description}}
                    </p>
                    <hr>
                    @if($product->qty > 0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out Of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value={{$product->id}} class="product_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:120px">
                            <button class="input-group-text decrement-btn"style="font-weight:800">-</button>
                            <input type="text"name="quantity "value="1"class="form-control qty-input text-center">
                            <button class="input-group-text increament-btn" style="font-weight:800">+</button>
                        </div>
                      </div>
                      <div class="col-md-12">
                          <br/>
                          <hr>
                          @if($product->qty > 0)
                          <button type="button"class="btn btn-success me-3 addtocart flaot-start">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                          @endif

                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {{$product->description}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
