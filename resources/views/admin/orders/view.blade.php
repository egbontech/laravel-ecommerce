@extends('layouts.admin')

@section('title','Order-detials')

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                  <h4>Order View</h4>
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
                            <label for="">Order Date</label>
                            <div class="border p-2">
                                {{$orders->created_at->format('d-m-Y')}}                             
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
                            <div class="mt-3 col-md-6">
                           <form action="{{url('admin/update-order/'.$orders->id)}}"method="POST">
                            @csrf
                            @method('PUT')
                            <label for=""name="order_status">Order Status:</label>
                            <select style="width: 200px;height:30px;border:2px solid #185;margin:5px"name="order_status" >                               
                                <option value="0" {{$orders->status == 0 ? 'selected':''}}>Pending</option>
                                <option value="1"{{$orders->status == 1 ? 'selected':''}}>Completed</option>                              
                              </select>
                              <button type="submit"class="btn btn-success mt-2">Update status</button>
                            </form>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection