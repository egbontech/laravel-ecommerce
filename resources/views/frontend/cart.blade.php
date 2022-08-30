@extends('layouts.app')

@section('title','Cart')

@section('content')

<div class="container my-4"id="cart">
    <div class="card carts">
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartitems as $item)
                
           
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('assets/uploads/product/'.$item->products->image)}}" alt="cart-item"width="70px"height="70px">
                </div>
                <div class="col-md-2">
                    <h5>{{$item->products->name}}</h5>
                </div>
                <div class="col-md-2">
                    <h5>&#8358 {{$item->products->selling_price}}</h5>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" value="{{$item->product_id}}" class="product_id">
                    @if($item->products->qty > $item->product_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3"style="width:130px">                      
                        <button class="input-group-text changeQuantity decrement-btn"style="font-weight:800">-</button>
                        <input type="text"name="quantity "value="{{$item->product_qty}}"class="form-control qty-input text-center">
                        <button class="input-group-text changeQuantity increament-btn" style="font-weight:800">+</button>                     
                      
                    </div>
                  
                    @else
                    <h6 style="color:red;font-weight:600">Out Of Stock</h6>
                    @endif 
                    @php $total += $item->products->selling_price * $item->product_qty; @endphp
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item mb-2"style="font-size:12px"> <i class="fas fa-trash"></i> Remove</button>
                </div>
                      
            </div>
         
            @endforeach
       

    </div>
    <div class="card-footer"id="checkout">
        <h6>Total Price : &#8358 {{$total}}</h6>
        <a href="{{url('checkout')}}" class="btn float-end btn-outline-success" >Checkout</a>
    </div>
    @else
    <div class="card-body text-center">
        <h2>Your <i class="fas fa-shopping-cart"></i> cart is empty</h2>
        <a href="{{url('category')}}"class="btn btn-outline-success ">Continue Shoping</a>
    </div>
    @endif
</div>
</div>
@endsection
