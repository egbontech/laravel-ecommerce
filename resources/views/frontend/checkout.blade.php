@extends('layouts.app')

@section('title','Checkout')

@section('content')
@php $total = 0; @endphp
<div class="container"style="padding-top:20px">
    <form action="{{url('place-order')}}"method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Detials</h6>  
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter First Name"name="fname" value="{{Auth::user()->name}}"required>                            
                        </div>                        
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter Last Name"name="lname"value="{{Auth::user()->lname}}"required>                            
                        </div>                        
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter Your Email"name="email"value="{{Auth::user()->email}}"required>                            
                        </div>                        
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter Phone Number"name="phone"value="{{Auth::user()->phone}}"required>                            
                        </div>    
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter Address"name="address"value="{{Auth::user()->address}}"required>                            
                        </div>    
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter City"name="city"value="{{Auth::user()->city}}"required>                            
                        </div>    
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter State"name="state"value="{{Auth::user()->state}}"required>                            
                        </div>    
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter Country"name="country"value="{{Auth::user()->country}}"required>                            
                        </div>    
                        <div class="col-md-6 mt-4">
                            <input type="text"class="form-control"placeholder="Enter Pin Code"name="pincode"value="{{Auth::user()->pincode}}"required>                            
                        </div>    
                    </div>                  
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                @if($cartitems->count() > 0)
                <div class="card-body">
                    Order Detials
                    <hr>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>Product</th>                
                                <th>Quantity</th>                
                                <th>price</th>                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cartitems as $item)
                            <tr>
                                <td> {{$item->products->name}} </td>
                                <td> {{$item->product_qty}} </td>
                                <td> &#8358 {{$item->products->selling_price}} </td>
                                @php $total += $item->products->selling_price * $item->product_qty; @endphp
                                @empty
                                <td>{{ Auth::user()->name }} your cart is empty or product no longer in stock for purchase</td>
                               
                            </tr>
                          
                            @endforelse
                  
                           
                        </tbody>
                    </table>
                     <div style="display: flex;justify-content:space-between">
                         <h5>Grand Total:</h5>
                    <h5>{{$total}}</h5>
                </div>
            
                    <button class="btn btn-secondary w-100 mb-2"style="background:#185 !important"type="submit">Place Order | Cash On Delivery</button>
                    <button class="btn btn-primary w-100 mb-2"type="button">Pay With Paypal</button>
                    <button class="btn btn-secondary w-100"type="button">Pay with paystack</button>
                  
            
                    
                 
                </div>
                @else
                <div class="card-body">
                    <h2 class="text-center">Your cart is Empty</h2>
                </div>
            </div>
        </div>
        @endif
    </div>
</form>
</div>
@endsection