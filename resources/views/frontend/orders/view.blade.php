@extends('layouts.app')

@section('title','Order-detials')

@section('content')

<div class="container"style="padding-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                  <h4>Order View
                      <a class="btn btn-success float-end"style="background:#185"href="{{url('order-detials')}}">Back</a>
                  </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <div class="border p-2">{{$orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address}},
                                {{$orders->city}},
                                {{$orders->state}},
                                {{$orders->country}}.
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">
                                {{$orders->pincode}}                             
                            </div>
                            <label for="">Tracking No.</label>
                            <div class="border p-2">
                                {{$orders->tracking_no}}                             
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>                      
                                        <th>Price</th>                      
                                        <th>Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $order)                                       
                                 
                                    <tr>                                 
                                     <td>{{$order->products->name}}</td>
                                     <td>{{$order->qty}}</td>
                                     <td>&#8358 {{$order->price}}</td>
                                     <td><img src="{{asset('assets/uploads/product/'.$order->products->image)}}" alt=""height="60px"width="60px"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Grand Total: <span class="float-end">&#8358 {{$orders->total_price}}</span></h4>
                        </div>
                    </div>
                  
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection