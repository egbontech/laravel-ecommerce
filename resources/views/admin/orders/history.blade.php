@extends('layouts.admin')

@section('title','Completed-orders')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Completed Orders
                        <a href="{{url('admin/orders')}}"class="btn btn-success float-end">Pending Orders</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>                      
                                <th>Status</th>                      
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                
                           
                            <tr>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                <td>{{$order->tracking_no}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->status == '0' ? 'pending' : 'completed'}}</td>
                              <td>
                                  <a href="{{url('admin/view-orders/'.$order->id)}}"class="btn btn-outline-success">Detials</a>
                              </td>
                              <td>
                                  <a href="{{url('delete-history/'.$order->id)}}"class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection