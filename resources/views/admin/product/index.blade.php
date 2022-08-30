@extends('layouts.admin')

@section('title','products')


@section('content')

    <div class="card">
        <div class="card-header">
           
            <h2>Products
                <a href="{{url('admin/add-product')}}" class="btn btn-secondary float-end">Add Product</a>
            </h2>
           
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Name</th>                       
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                       
                    </tr>                    
                </thead>    
                <tbody>
                    @foreach ($products as $product)                      
                
                    <tr>
                        <td>{{$product->id}}</td>                        
                        <td>{{$product->category->name}}</td>                        
                        <td>{{$product->name}}</td>                        
                        <td>{{$product->original_price}}</td>                        
                        <td>{{$product->selling_price}}</td>                        
                        <td>
                            <img src="{{asset('assets/uploads/product/'. $product->image)}}" alt="img" height="70px"width="80px">
                        </td>                        
                        <td>
                            <a href="{{url('admin/edit-product/'.$product->id)}}" class="btn btn-secondary">Edit</a>
                            <a href="{{url('admin/delete-product/'.$product->id)}}" class="btn btn-danger">Delete</a>
                        </td>                        
                                            
                                               
                    </tr>     
                    @endforeach             
                </tbody>            
            </table>         
        </div>
    </div>
@endsection