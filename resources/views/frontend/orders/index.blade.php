@extends('layouts.app')

@section('title','Order-detials')

@section('content')
<div class="container "style="padding-top:50px">
    <div class="row justify-content-center">
        <div class="col-md-9 ">
            <div class="card">
                <div class="card-header">
                  <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    <h6>Orders Completed will  be deleted Automatically</h6>
                    <table class="table table-striped">
                        @forelse ($orders as $order)
                        <thead>
                            <tr>

                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            <tr>

                                <td>&#8358 {{$order->total_price}}</td>
                                <td>{{$order->status == '0' ? 'pending' : 'completed'}}</td>
                              <td>
                                  <a href="{{url('view-order/'.$order->id)}}"class="btn btn-outline-success">Detials</a>
                              </td>
                            </tr>
                            @empty
                          <div>
                              <h1>No orders yet</h1>
                          </div>


                        </tbody>
                        @endforelse

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
